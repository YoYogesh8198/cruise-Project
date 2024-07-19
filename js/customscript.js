function custom_template(obj) {
  var data = $(obj.element).data();
  var text = $(obj.element).text();
  if (data && data["img_src"]) {
    img_src = data["img_src"];
    template = $(
      '<div style="display: flex;gap: 5px;align-items: center;" > <img src="' +
        img_src +
        '" style="width:50px;height:21px;"/><p style="font-weight: 500;font-size:14px;">' +
        text +
        "</p></div>"
    );
    return template;
  } else {
    template = $(
      '<div style="display: flex;gap: 5px;align-items: center;" > <p style="font-weight: 500;font-size:18px;">' +
        text +
        "</p></div>"
    );
    return template;
  }
}
var options = {
  templateSelection: custom_template,
  templateResult: custom_template,
};
$("#cruise-line").select2(options);
$(".select2-container--default .select2-selection--single").css({
  height: "60px",
  display: "flex",
  "flex-direction": "row",
  " width": "609px",
});
// --------------
$(window).resize(function () {
  if ($(window).width() < 768) {
    document.getElementById("mySidenav").style.width = "0";
  } else {
    document.getElementById("mySidenav").style.width = "auto";
  }
});

function openNav() {
  event.stopPropagation();
  $(".hambrg").hide();
  $(".hambrg").addClass("open");
  if ($(".hambrg").hasClass("open")) {
    $("body").addClass("noscroll");
  } else {
    $("body").removeClass("noscroll");
  }
  document.getElementById("mySidenav").style.width = "180px";
  document.getElementById("main_ctr").style.marginLeft = "-180px";
}

function closeNav() {
  event.stopPropagation();
  $(".hambrg").show();
  $(".hambrg").removeClass("open");
  if ($(".hambrg").hasClass("open")) {
    $("body").addClass("noscroll");
  } else {
    $("body").removeClass("noscroll");
  }
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main_ctr").style.marginLeft = "0";
}

$(function () {
  $("#depart_date")
    .daterangepicker({
      autoApply: true,
      autoUpdateInput: false,
      minDate: new Date(),
      startDate: moment(),
      endDate: moment().add(1, "Day"),
      locale: {
        format: "YYYY-MM-DD",
      },
    })
    .on("apply.daterangepicker", function (ev, picker) {
      // Enable autoUpdateInput
      $(this).data("daterangepicker").autoUpdateInput = true;

      // Set the value of the input field
      $(this).val(
        picker.startDate.format("MMM DD ,YY") +
          " - " +
          picker.endDate.format("MMM DD ,YY")
      );
    });
});

$(document).ready(function () {
  $("#pop_up").click(function () {
    $(".add_body").slideToggle("slow");
  });
});

document.getElementById("pop_up").addEventListener("click", function () {
  // Get the image element
  var image = this.querySelector("img.arrow-down");

  // Toggle rotation
  if (image.classList.contains("rotate")) {
    image.style.transform = "rotate(0deg)";
    image.classList.remove("rotate");
  } else {
    image.style.transform = "rotate(180deg)";
    image.classList.add("rotate");
  }
});



