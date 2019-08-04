from sklearn import preprocessing as p
import pandas as pd
import numpy as np



df=pd.read_csv('DiseasePrediction/final_dataset_matrix.csv')
x=df.iloc[:,1:]
x=x.replace(0,np.nan)
#min_max=p.MinMaxScaler(feature_range=(1,4))
#print(x)
max1=4
min1=1
#x_scaled=min_max.fit_transform(x)
clmn=list(df)[1:]
#print(clmn)
#for col in clmn:
x=min1+(max1-min1)*(x-x.min())/(x.max()-x.min())
x=x.fillna(0)
#print(x)
dd=pd.DataFrame(x)

dd.index=list(df['MeSH_Disease_Term' ])
dd.to_csv('DiseasePrediction/norm_dataset_matrix.csv')
print(dd)