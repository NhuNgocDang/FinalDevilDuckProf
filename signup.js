// use to get information from each field and put it in the template by ID
$(function () {
    $(".textInput:eq(0)").keyup(function () {
        $(".MCN:eq(0)").text($(".textInput:eq(0)").val());
    });
    $(".textInput:eq(1)").keyup(function () {
        $(".PAU:eq(0)").text($(".textInput:eq(1)").val());
    });
    $(".textInput:eq(2)").keyup(function () {
        $(".PAU:eq(1)").text($(".textInput:eq(2)").val());
    });
    $(".textInput:eq(3)").keyup(function () {
        $(".PAU:eq(2)").text($(".textInput:eq(3)").val());
    });
     $(".textInput:eq(4)").keyup(function () {
        $(".PAU:eq(3)").text($(".textInput:eq(4)").val());
    });
    $(".textInput:eq(5)").keyup(function () {
        $(".wangzhi:eq(0)").text($(".textInput:eq(5)").val());
    });

    $(".textInput:eq(6)").keyup(function () {
        $(".JD-p:eq(0)").text($(".textInput:eq(6)").val());
    });
    $(".EnvelopePage:eq(0)").click(function () {
        $("#back_bleed_area").css("display","none");
        $("#back").css("display","block");
    });
    $(".EnvelopePage:eq(1)").click(function () {
        $("#back_bleed_area").css("display","block");
        $("#back").css("display","none");
    });
    
    //use to set the fornt for the text
    $(".fontSize:eq(0)").click(function () {
        var fontSize=parseFloat($(".MCN:eq(0)").css("font-size"),10);
        fontSize-=2;
        $(".MCN:eq(0)").css("font-size",fontSize+$(".MCN:eq(0)").css("font-size").slice(-2));
    });
    $(".fontSize:eq(1)").click(function () {
        var fontSize=parseFloat($(".MCN:eq(0)").css("font-size"),10);
        fontSize+=2;
        $(".MCN:eq(0)").css("font-size",fontSize+$(".MCN:eq(0)").css("font-size").slice(-2));
    });
    
    // use to alignment text
    $(".Alignment:eq(0)").click(function () {
        $(".MCN:eq(0)").css("margin-left","-35px");
    });
    $(".Alignment:eq(1)").click(function () {
        $(".MCN:eq(0)").css("margin-left","80px");
    });
    $(".Alignment:eq(2)").click(function () {
        $(".MCN:eq(0)").css("margin-left","215px");
    });
    $(".u:eq(0)").click(function () {
        $("#uploadFile").trigger("click");
    });
    $(".u:eq(1)").click(function () {
        $("#uploadLogoFile").trigger("click");
    });
    // function use to upload a logo
    $("#uploadLogoFile").change(function () {
        if($("#uploadLogoFile").val()!=""&&$("#uploadLogoFile").val()!=undefined&&$("#uploadLogoFile").val()!=null){
            var photoFile=$("#uploadLogoFile").val();
            var suffix=photoFile.toLowerCase().split('.').splice(-1);
            var suffixRule=/png|jpg|jpeg/g;
            if(suffixRule.test(suffix)){
                $.ajax({
                    url:"upload.php",
                    contentType:"multipart/form-data",
                    async:true,
                    type:"POST",
                    data:{filePath:photoFile},
                    dataType:"json",
                    success:function (data) {
                        $(".img1:eq(0)").attr("src",data.filePath);
                    },
                    error:function (data) {
                        alert("Radio waves can not reach yo!");
                    }
                });

            }
        }
    });
});
