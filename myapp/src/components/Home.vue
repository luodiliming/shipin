<template>
  <div>
    	<!--轮播图-->
        		<div class="swiper-container">
        			<div class="swiper-wrapper">
        				<div class="swiper-slide">
        					<a href=""><img src="static/images/1.jpg"/></a>
        				</div>
        				<div class="swiper-slide">
        					<a href=""><img src="static/images/2.jpg"/></a>
        				</div>
        				<div class="swiper-slide">
        					<a href=""><img src="static/images/3.jpg"/></a>
        				</div>
        			</div>
        			<!-- 如果需要分页器 -->
        			<div class="swiper-pagination"></div>
        		</div>
        		<!--轮播图结束-->

        		<!--推荐视频-->
        		<h2>推荐视频</h2>

        		<div id="recommend">
        		 <router-link :to="{name:'Page',params:{lessonId:v.id}}" v-for="v in commondLessons" :key="v.id">
                                <img :src="v.pic" alt=""/>
                                <i class="iconfont icon-bofang"></i>
                                <span class="time">22:56</span>
                                <span class="title">{{v.ltitle}}</span>
                  </router-link>

        		</div>
        		<!--推荐视频结束-->

        		<a href="" class="more">MORE ></a>


        		<!--热门视屏-->
        		<h2>热门视屏</h2>

        		<div class="today">
        			<a href="" class="title">大数据下的广告：精准投放与精准消除</a>
        			<p class="column">网络资讯</p>
        			<div class="pic">
        				 <router-link v-for="v in hotLessons" :to="{name:'Page',params:{lessonId:v.id}}" :key="v.id">
                                            <img :src="v.pic" alt="">
                         </router-link>
        			</div>
        		</div>
        		<!--热门视屏结束-->


        		<!--底部固定导航-->
        		<ul id="bottom">
        			<li class="cur">
        				<a href="index.html">
        					<i class="iconfont icon-shouyeshouye"></i>
        					<span>首页</span>
        				</a>
        			</li>
        			<li>
        				  <router-link to="/video">
                                            <i class="iconfont icon-icon02"></i>
                                            <span>视频</span>
                      </router-link>
        			</li>
        		</ul>
        		<!--底部固定导航结束-->

  </div>
</template>

<script>
export default {
  name: 'home',
      mounted(){
              //获取推荐课程
              this.axios.get('http://www.liming.dev/api/commondLessons/4').then((response) => {
                  console.log(response.data);
                  this.commondLessons = response.data.data;
              })
              //获取热门课程
              this.axios.get('http://www.liming.dev/api/hotLessons/3').then((response) => {
                  console.log(response.data);
                  this.hotLessons = response.data.data;
              })
          },
  data () {
     return {
                   commondLessons:[],
                   hotLessons:[],
                   sliders: [
                       {id: 1, path: 'static/images/1.jpg'},
                       {id: 2, path: 'static/images/2.jpg'},
                       {id: 3, path: 'static/images/3.jpg'},
                   ],
                   swiperOption: {
                       // swiper optionss 所有的配置同swiper官方api配置
                       autoplay: 3000,
   //            direction : 'vertical',
                       grabCursor: true,
                       setWrapperSize: true,
                       autoHeight: true,
                       pagination: '.swiper-pagination',
                       paginationClickable: true,
                       prevButton: '.swiper-button-prev',
                       nextButton: '.swiper-button-next',
                       scrollbar: '.swiper-scrollbar',
                       mousewheelControl: true,
                       observeParents: true,
                       // if you need use plugins in the swiper, you can config in here like this
                       // 如果自行设计了插件，那么插件的一些配置相关参数，也应该出现在这个对象中，如下debugger
                       debugger: true,
                       // swiper callbacks
                       // swiper的各种回调函数也可以出现在这个对象中，和swiper官方一样
                       onTransitionStart(swiper) {
                           console.log(swiper)
                       },
                       // more Swiper configs and callbacks...
                       // ...
                   }
               }
  }
}
</script>

<style scoped>
    * {
        padding: 0;
        margin: 0;
        color: #31343B;
    }

    a {
        text-decoration: none;
        color: #31343B;;
    }

    li {
        list-style: none;
    }

    body {
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        padding-bottom: 10%;
    }

    .swiper-container {
        width: 100%;
        height: 300px;
    }

    .swiper-slide {
        background: red;
    }

    .swiper-container .swiper-slide a {
        display: block;
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .swiper-container .swiper-slide img {
        width: 100%;
        height: 300px;
        position: absolute;
        left: 50%;
        top: 0;
        transform: translateX(-50%);
    }

    /*分页器颜色*/
    .swiper-pagination-bullet-active {
        background: rgba(255, 255, 255, 0.6);
    }

    h2 {
        font-size: 4vw;
        text-align: center;
        font-weight: 700;
        line-height: 2em;
        width: 33%;
        margin: 0 auto;
        position: relative;

        margin-top: 4%;
    }

    h2:before {
        content: '◆';
        position: absolute;
        left: 0;
        font-size: 3vw;
    }

    h2:after {
        content: '◆';
        position: absolute;
        right: 0;
        font-size: 3vw;
    }

    /*推荐视频*/
    #recommend {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        width: 92%;
        margin: 0 auto;
    }

    #recommend a {
        width: 48%;
        overflow: hidden;
        display: block;
        margin-top: 4%;
        position: relative;
    }

    #recommend a img {
        width: 100%;
    }

    #recommend a .iconfont.icon-bofang {
        position: absolute;
        color: rgba(255, 255, 255, 1);
        left: 50%;;
        top: 50%;
        font-size: 8vw;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.4);
        border-radius: 50%;
        line-height: 1em;
    }

    #recommend a .time {
        line-height: 1.5em;
        font-size: 3vw;
        color: white;
        background: rgba(0, 0, 0, 0.5);
        position: absolute;
        right: 0;
        top: 0;
        padding: 0 2%;
    }

    #recommend a .title {
        position: absolute;
        bottom: 0;
        left: 0;
        line-height: 1.6em;
        color: white;
        text-align: center;
        width: 100%;
        background: linear-gradient(top, transparent, rgba(0, 0, 0, 0.6));
        background: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.6));
    }

    .more {
        color: #ABB0BC;
        text-align: center;
        line-height: 3em;
        display: block;
        width: 100%;
        border-bottom: 5px solid #ECEEF1;
    }

    /*今日推荐*/
    .today {
        border-top: 1px solid #ECEEF1;
        border-bottom: 1px solid #ECEEF1;
        margin-top: 2%;
        margin-bottom: 100px;
        padding-top: 3%;
        padding-bottom: 3%;
        overflow: hidden;

    }

    .today .title {
        margin-left: 4%;
        line-height: 2em;
        font-size: 3.5vw;
        font-weight: 700;
        float: left;
        width: 70%;
    }

    .today .column {
        float: right;
        margin-right: 4%;
        line-height: 2em;
        font-size: 3.5vw;
        color: white;
        background: #FB415F;
        padding: 0 2%;
    }

    .today .pic {
        height: 55vw;
        float: left;
        width: 92%;
        margin-left: 4%;
    }

    .today .pic a {
        display: block;
        float: left;
        overflow: hidden;
        position: relative;
        box-sizing: border-box;
    }

    .today .pic a img {
        min-height: 100%;
        max-height: 120%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .today .pic a:nth-child(1) {
        width: 60%;
        height: 100%;
        border-right: 4px solid white;
    }

    .today .pic a:nth-child(2) {
        width: 40%;
        height: 50%;
        border-bottom: 4px solid white;
    }

    .today .pic a:nth-child(3) {
        width: 40%;
        height: 50%;
    }

    /*底部固定导航*/
    #bottom {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        background: #FFFFFF;
        margin: 0;
    }

    #bottom li {
        width: 50%;
        box-sizing: border-box;
    }

    #bottom li i.iconfont {
        color: #888;
        font-size: 6vw;
        display: block;
        text-align: center;
    }

    #bottom li span {
        font-size: 2.6vw;
        display: block;
        text-align: center;
        color: #888;
    }

    #bottom li.cur {
        /*background: #333;*/
    }

    #bottom li.cur i.iconfont {
        color: #333;
    }

    #bottom li.cur span {
        color: #333;
    }

    /*底部固定导航结束*/
</style>

