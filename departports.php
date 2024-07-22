<?php
$greatcruiseleaving_cursor = $m->greatcruiseleaving(["_id" => ['$ne' => null]], 2);
$FindBestCruise_cursor = $m->FindBestCruise(["_id" => ['$ne' => null]], 2);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 top_heading3">Departure Port with Great Cruises Leaving from</div>
    </div>
    <!-- Slider -->
    <div class="carousel-container">
        <div id="new-slider2" class="owl-carousel owl-theme">
            <?php foreach ($greatcruiseleaving_cursor as $bestDepartData) { ?>

                <div class="slider-wrapper">
                    <div class="imgCard imgCard2">
                        <div class="imgtext">
                            <?php echo $bestDepartData["title"]; ?>
                        </div>
                        <img src="<?php echo $bestDepartData["img"]; ?>" alt="Popular Cruise Image1">
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<!-- //*Find the Best Cruise Vacation for you  -->
<div class="container">
    <div class="row">
        <div class="col-md-12 top_heading3">Find the Best Cruise Vacation for you</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="accordion accordion_mine" id="accordionExample">
                <?php foreach ($FindBestCruise_cursor as $index => $findBestCruise) { ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_<?php echo $index; ?>">
                            <button class="accordion-button <?php echo $index === 0 ? 'active' : ''; ?>" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo $index; ?>"
                                aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                                aria-controls="collapse_<?php echo $index; ?>">
                                <?php echo $findBestCruise["question"]; ?>
                            </button>
                        </h2>
                        <div id="collapse_<?php echo $index; ?>"
                            class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>"
                            aria-labelledby="heading_<?php echo $index; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php echo $findBestCruise["answer"]; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>