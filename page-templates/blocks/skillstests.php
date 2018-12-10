<?php // TEXT BLOCK

if( get_row_layout() == 'skills_tests' ):

  ?>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <div id="controls" class="controls py-2">
    <div class="d-flex align-items-center py-2"><input id="search"></input><button class="btn" id="searchbtn">Search</button></div>
    <div class="d-flex align-items-center py-2">
      <h6 class="px-2 mb-0">Category</h6>
      <select id="category" name="category" class="select">
        <option value="all">All</option>
      </select>
    </div>
    </div></div>
    </div>
    <div class="row justify-content-center">
    <div class="col-md-12 accordian" id="testsbox"></div>
  </div>
  <div class="row justify-content-center my-4">
    <div id="pagination"><ul id="pageList" class="pageList pagination"></ul></div>
  </div>
</div>


<script>
const a = <?php echo readLocalJsonData(); ?>;
new testsBox(a);
</script>

<?php endif;

?>
