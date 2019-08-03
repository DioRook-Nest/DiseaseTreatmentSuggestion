<script>
    $(document).ready(function () {
    $('#dtHorizontalVerticalExample').DataTable({
    "scrollX": true,
    "scrollY": 200,
    });
    $('.dataTables_length').addClass('bs-select');
    });
    </script>


<div class="container" style="width:90%">
<table id="dtHorizontalVerticalExample" style="max-width:100%" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
 <?php
 $f = fopen("res.csv", "r");?>
  <thead>
    <tr>
    <?php
    $head = fgetcsv($f);
    foreach ($head as $cell) {
    ?>
      <th class="th-sm"><?php echo  htmlspecialchars($cell);?>
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
    