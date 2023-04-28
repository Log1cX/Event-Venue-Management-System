<style>
    .hall-image-view-holder{
        width:100%;
        height:10em;
        overflow:hidden;
    }
    .hall-image-view{
        width:100%;
        height:100%;
        object-fit:cover;
        object-position:center center;
        transition:transform .2s ease-in;
    }
    .hall-item:hover .hall-image-view{
        transform:scale(1.2)
    }
</style>
<div class="content py-5">
    <h3 class="text-center"><b>Our Halls</b></h3>
    <hr class="w-25 border-light">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="input-group mb-2">
                <input type="search" id="search" class="form-control form-control-border" placeholder="Search hall here...">
                <div class="input-group-append">
                    <button type="button" class="btn btn-sm border-0 border-bottom btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" id="hall-list">
        <?php  
        $halls = $conn->query("SELECT * FROM `hall_list` where delete_flag = 0 and `status` = 1 order by `name` asc");
        while($row = $halls->fetch_assoc()):
        ?>
        <div class="col-sm-12 col-md-6 col-lg-6 hall-item">
            <a class="text-docoration-none text-reset view_hall" data-id="<?= $row['id'] ?>" href="javascript:void(0)">
                <div class="callout border-danger rounded-0 shadow">
                    <div class="d-flex align-items-center">
                        <div class="col-4 text-center">
                            <div class="hall-image-view-holder">
                                <img src="<?= validate_image($row['image_path']) ?>" alt="Hall Image" class="img-fluid bg-gradient-gray hall-image-view">
                            </div>
                        </div>
                        <div class="col-8">
                            <h4><b><?= $row['name'] ?></b></h4>
                            <p class="truncate-3"><?= html_entity_decode($row['description']) ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
    <?php if($halls->num_rows < 1): ?>
        <center><span class="text-muted">No hall Listed Yet.</span></center>
    <?php endif; ?>
        <div id="no_result" style="display:none"><center><span class="text-muted">No hall Listed Yet.</span></center></div>
</div>
<script>
    $(function(){
        $('.view_hall').click(function(){
            uni_modal("Hall Details","view_hall.php?id="+$(this).attr('data-id'),'mid-large')
        })
        $('#search').on("input",function(e){
            var _search = $(this).val().toLowerCase()
            $('#hall-list .hall-item').each(function(){
                var _txt = $(this).text().toLowerCase()
                if(_txt.includes(_search) === true){
                    $(this).toggle(true)
                }else{
                    $(this).toggle(false)
                }
                if($('#hall-list .hall-item:visible').length <= 0){
                    $("#no_result").show('slow')
                }else{
                    $("#no_result").hide('slow')
                }
            })
        })
    })
</script>