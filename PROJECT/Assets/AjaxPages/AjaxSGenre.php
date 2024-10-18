<?php
include("../Connection/connection.php");
if($_GET['cat']!="")
{
    if($_GET['cat']!=""){
    $selCat="SELECT * FROM tbl_category where TRUE AND cat_id IN(".$_GET['cat'].") ";
    }
    $resCat=$con->query($selCat);
    while($dataCat=$resCat->fetch_assoc()){
    ?>
    <div class="catList">
        <span class="catHead">
            <?php echo $dataCat['cat_name'] ?>
        </span>
        <div class="modalButtons">
        <?php
            $selG="SELECT * FROM tbl_genre WHERE genre_cat=".$dataCat['cat_id'];
            $resG=$con->query($selG);
            if($resG->num_rows>0)
            {
            while($dataG=$resG->fetch_assoc())
            {
            ?>
                <div class="checkboxes">
                    <input type="checkbox" onclick="addGenre(<?php echo $dataG['genre_id'] ?>)" id="genre-<?php echo $dataG['genre_id'] ?>" name="genre"
                        value="<?php echo $dataG['genre_id'] ?>">
                    <label for="genre-<?php echo $dataG['genre_id'] ?>" class="labelModal">
                        <?php echo $dataG['genre_name']?>
                    </label>
                </div>
            <?php
            }
            }
            else
            {
                ?>
                <span class="noGenre">No Genres in this category</span>
                <?php
            }
            ?>
        </div>

    </div>
    <?php
    }
}
?>