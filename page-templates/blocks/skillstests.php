<?php // TEXT BLOCK

if( get_row_layout() == 'skills_tests' ):

  ?>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <div id="controls" class="controls py-2">
    <div class="row py-2"> 
       <div class="col-md-4">
          <div class="select__wrapper" id="selectwrapper">
            <select id="category" name="category" class="select mr-4">
              <option value="all">All categories </option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <input id="search" placeholder="Search with keyword"></input>
        </div>
        <div class="col-md-3">
        <button class="d-block btn btn--solid w-100 m-0" id="searchbtn">Search</button>
        </div>
        <div class="col-md-1">
        <button class="d-block btn btn--outline w-100 m-0" id="clearbtn"><i class="fas fa-redo-alt"></i></button>
        </div>
    </div></div>
    </div>
</div>
    <div class="row justify-content-center">
    <div class="col-md-12 accordian" id="testsbox"></div>
  </div>
  <div class="row justify-content-center my-4">
    <div id="pagination"><ul id="pageList" class="pageList pagination"></ul></div>
  </div>
</div>


<script>
var _skillsTests = <?php echo readLocalJsonData(); ?>;
new testsBox(_skillsTests);
</script>

<?php endif;

?>
