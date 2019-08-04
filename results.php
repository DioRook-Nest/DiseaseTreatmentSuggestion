<script>
   
    </script>


<div  style="overflow-x:auto; ">
<table id="dtHorizontalVerticalExample"  class="table  table-striped table-bordered table-sm " cellspacing="0" width="100%"  style="max-width:100%; display:block;overflow-y:scroll;height:200px;">
 <?php
 $f = fopen("DiseasePrediction/res.csv", "r");?>
  <thead>
    <tr>
    <?php
    $head = fgetcsv($f);
    foreach ($head as $cell) {
    ?>
      <th class=""><?php echo  htmlspecialchars($cell);?>
      </th>
    <?php }?>
    </tr>
  </thead>
  <tbody>
  <?php
  while (($line = fgetcsv($f)) !== false) {?>
    <tr>
        <?php 
        foreach ($line as $cell) { ?>
            <td>
            <?php echo htmlspecialchars($cell); ?>
            </td>
        <?php } ?>
        </tr>
    <?php } ?>
    </tr>
  </tbody>
  <tfoot>
    <tr>
    
    <?php 
    fclose($f);
    
    ?>
    </tr>
  </tfoot>
</table>
</div>
    