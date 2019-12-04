window.onload=function () {
    //调用轮播的函数
    new Swiper('.swiper-container',{
        effect:'coverflow',//轮播效果为3D翻转
        direction:'horizontal',//方向为水平，从右往左
        speed:300,//速度300ms
        loop:true,//循环
        autoplay:true,//自动
    });
}