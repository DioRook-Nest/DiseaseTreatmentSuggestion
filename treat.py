import pandas as pd
import numpy as np
from difflib import get_close_matches
import sys
from fuzzywuzzy import fuzz 
from fuzzywuzzy import process

def closeMatches(word,patterns,thresh,du):
    result=get_close_matches(word,patterns,cutoff=0.3)
    l=[]
    print(result)
    for r in result:
        for p in  du:
            if r in p.lower():
                l.append(p)
                break
    return l

def treatmentlist(sub,c):
    prescriptions=pd.merge(c,sub[['SUBJECT_ID','SEQ_NUM']],how='inner',on='SUBJECT_ID')
    d=prescriptions['DRUG_NAME_GENERIC'].value_counts()[:10]
    key=list(d.keys())
    #print(key)
    result=pd.DataFrame()
    for k in key:
        result=result.append([prescriptions.loc[prescriptions['DRUG_NAME_GENERIC']==k,'STARTDATE':'SEQ_NUM'].iloc[0]])
    if not result.empty:  
        result['STARTDATE']=pd.to_datetime(result['STARTDATE'])
        result['ENDDATE']=pd.to_datetime(result['ENDDATE'])    
        result['DURATION(in Days)']=(result['ENDDATE']-result['STARTDATE']+pd.Timedelta(days=1)).dt.days
        result=result[["DRUG_NAME_GENERIC","FORMULARY_DRUG_CD","DURATION(in Days)","PROD_STRENGTH","DOSE_VAL_RX","DOSE_UNIT_RX","GSN","NDC","FORM_VAL_DISP","FORM_UNIT_DISP","ROUTE"]]
    
    result=result.reset_index(drop=True)
    result.index+=1
    #print(result)
    result.to_csv('res.csv')
    
    return result

if __name__=='__main__':
    
    #inputdiag='Ludwigs angina - severe infection in the floor of the mouth and neck'
    #inputdiag=sys.argv[1]
    f=open('disease.txt','r')
    inputdiag=str(f.readline())
    a=pd.read_csv('d_icd_diagnoses.csv')
    b=pd.read_csv('DIAGNOSES_ICD.csv')
    c=pd.read_csv('PRESCRIPTIONS.csv')
    a=pd.DataFrame(a)
    b=pd.DataFrame(b)
    c=pd.DataFrame(c)
    result=pd.DataFrame()
    
    #print('1',inputdiag)


    #print(a)
    #temp2=[i for i in ]
    temp=list(a['LONG_TITLE']) #.str.lower())  #if a['icd9_code'] in b['icd9_code'])
    #print(temp)
    ip=''
    ip=inputdiag.lower()
    if '-' in inputdiag:
        inputdiag=inputdiag.split('-')
        ip=inputdiag[0].lower()
    elif ',' in inputdiag:
        #ip=inputdiag.lower()
        inputdiag=inputdiag.split(',')
        #inputdiag=inputdiag[0]
    #dt=inputdiag.lower().split( )
    
    dt=[]
    if isinstance(inputdiag,str):
        inputdiag=[inputdiag]    
    '''if ip=='':
        ip=inputdiag[0].lower()'''

    print('ip: ',ip,inputdiag)
    for i in inputdiag:
        dt.extend(i.lower().split( ))
    #dt.reverse()
    

    
    #inter=1/l
    thresh=0.4
    dset=set()
    dsetu=set()
    unwanted=['in','from','of','on']
    dt=[i for i in dt if i  not in unwanted]
    print(dt)
    l=len(dt)
    for i in range(l):
        for j in temp:
            if dt[i] in j.lower():
                dset.add(j.lower())
                dsetu.add(j)
                #break
    #diaglist1=[i for i in temp if dt[l-1] in i]
    #print(diaglist1,dt)
    #diaglist=closeMatches(ip ,dset,thresh,dsetu)
    
    # Get a list of matches ordered by score, default limit to 5 
    diaglist=process.extract(ip, dsetu,scorer=fuzz.token_set_ratio) 

    print("\nclose match",diaglist)
    
    dfl=diaglist[0][0]
    ind=-1
    diag_id=pd.DataFrame()
    #print(temp)
    if diaglist:
        #ind=temp.index(diaglist[0])
        ind=temp.index(dfl)
    '''elif diaglist1:
        ind=temp.index(diaglist1[0])'''

    if ind!=-1:    
        diag_id=a.iloc[ind]
    #print(diag_id['icd9_code'])
    if not diag_id.empty:
        tid=diag_id['ICD9_CODE']
        #print(tid)
        #tid=str(53081)
        #print(b)
        #interdiag=pd.DataFrame()
        interdiag=b.loc[b['ICD9_CODE']==tid]
        #print(interdiag)
        result=treatmentlist(interdiag,c)

    if result.empty:
        print(0)
    else:
        print(1)