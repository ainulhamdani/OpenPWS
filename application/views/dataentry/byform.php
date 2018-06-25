<?php
$this->load->view("admin/header");
$this->load->view("admin/navbar");
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data entry berdasarkan form</h1>

    </div>

    <div>
        <div class="accordion" id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <span>Lokasi : <small class="text-muted"><?=isset($t1)?$loc['children'][$t1]['label']:""?> <?=isset($t2)?" > ".$loc['children'][$t1]['children'][$t2]['label']:""?> <?=isset($t3)?" > ".$loc['children'][$t1]['children'][$t2]['children'][$t3]['label']:""?> <?=isset($t4)?" > ".$loc['children'][$t1]['children'][$t2]['children'][$t3]['children'][$t4]['label']:""?></small></span>
                        <button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span data-feather="chevrons-down"></span>
                        </button>

                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-sm-3">
                                <?php
                                $tag = "";
                                foreach ($loc['children'] as $key => $child) {
                                    $tag = $child['node']['tags'][0];
                                    break;
                                }
                                ?>
                                <span><?=$this->loc->getTagDesc($tag)?> :</span>
                                <div class="list-group">
                                    <?php
                                    foreach ($loc['children'] as $key => $child) {
                                        ?>
                                        <a href="<?=base_url()?>dataentry/byform?t1=<?=$key?>" class="list-group-item list-group-item-action<?=$t1==$key?" active":""?>"><?=$child['label']?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php if(isset($t1)&&isset($loc['children'][$t1]['children'])){ ?>
                            <div class="col col-sm-3">
                                <?php
                                $tag = "";
                                foreach ($loc['children'][$t1]['children'] as $key => $child) {
                                    $tag = $child['node']['tags'][0];
                                    break;
                                }
                                ?>
                                <span><?=$this->loc->getTagDesc($tag)?> :</span>
                                <div class="list-group">
                                    <?php
                                    foreach ($loc['children'][$t1]['children'] as $key => $child) {
                                        ?>
                                        <a href="<?=base_url()?>dataentry/byform?t1=<?=$t1?>&t2=<?=$key?>" class="list-group-item list-group-item-action<?=$t2==$key?" active":""?>"><?=$child['label']?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } if(isset($t2)&&isset($loc['children'][$t1]['children'][$t2]['children'])){?>
                            <div class="col col-sm-3">
                                <?php
                                $tag = "";
                                foreach ($loc['children'][$t1]['children'][$t2]['children'] as $key => $child) {
                                    $tag = $child['node']['tags'][0];
                                    break;
                                }
                                ?>
                                <span><?=$this->loc->getTagDesc($tag)?> :</span>
                                <div class="list-group">
                                    <?php
                                    foreach ($loc['children'][$t1]['children'][$t2]['children'] as $key => $child) {
                                        ?>
                                       <a href="<?=base_url()?>dataentry/byform?t1=<?=$t1?>&t2=<?=$t2?>&t3=<?=$key?>" class="list-group-item list-group-item-action<?=$t3==$key?" active":""?>"><?=$child['label']?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } if(isset($t3)&&isset($loc['children'][$t1]['children'][$t2]['children'][$t3]['children'])){?>
                            <div class="col col-sm-3">
                                <?php
                                $tag = "";
                                foreach ($loc['children'][$t1]['children'][$t2]['children'][$t3]['children'] as $key => $child) {
                                    $tag = $child['node']['tags'][0];
                                    break;
                                }
                                ?>
                                <span><?=$this->loc->getTagDesc($tag)?> :</span>
                                <div class="list-group">
                                    <?php
                                    foreach ($loc['children'][$t1]['children'][$t2]['children'][$t3]['children'] as $key => $child) {
                                        ?>
                                        <a href="<?=base_url()?>dataentry/byform?t1=<?=$t1?>&t2=<?=$t2?>&t3=<?=$t3?>&t4=<?=$key?>" class="list-group-item list-group-item-action<?=$t4==$key?" active":""?>"><?=$child['label']?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
</div>
</div>

<?php $this->load->view("admin/footer"); ?>
