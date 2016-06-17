# BeautifulDay

##Directory  
* ####[register](#0)
* ####[fetch one day info](#1)  
* ####[fetch day info list](#1.1)  
* ####[fetch album detail info](#2)
* ####[zan](#3)
* ####[comment](#4)  
* ####[fetch comment list](#5)
 
***

###Latest modification(undone):

1. zan 字段调整
2. fetch album detail info comment list 逆序
3. 添加register
4. album info中添加了location和song_name两个字段
5. login 接口
6. register返回增加一个userid字段
***

####Base configure
#####BaseURL

	nil
	
#####BaseHeader
	
	"Content-Type" : "application/json"
	"user_id" : 4573 (int)
	 "accesstoken" : "fjkdfkda"

#####BaseResponse

	"errorcode" : 404 (int)
	"errordescription" : "server down"
	
***

***

<h2 id="0">Register
#####Description
//使用第三方进行注册，之后默认登录

暂时使用注册页面，注册后登录

#####Method

	// todo
	Post http://www.dev4love.com/api/register

#####Headers

	nil

#####Body   

	nil

#####Parameters  


	"user_name" : "jason"
	"password" : "xxxxxxx"
	// todo

#####Response
用户名被占用会返回
<pre><code>
{
  "status": "occupied"
}
</pre></code>

注册成功则返回
<pre><code>
{
  "status": "success",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOm51bGwsImlzcyI6Imh0dHA6XC9cL2hvbWVzdGVhZC5hcHBcL2FwaVwvcmVnaXN0ZXIiLCJpYXQiOjE0NjU5MjU2NTQsImV4cCI6MTQ2NTkyOTI1NCwibmJmIjoxNDY1OTI1NjU0LCJqdGkiOiJhMGZkZDQ3OWY4ZmJiZjljNjZjY2ViZTAzYTZlZDIzZCJ9.gL3Hx8W1a_skFnRKn6Bl4j1HirETlDR8LKyHNUHdI70"
}
</pre></code>
***

<h2 id="1">fetch one day info
#####Description
根据日期获取每日概要信息

#####Method

	// todo
	Post http://www.dev4love.com/api/oneday
#####Headers

	nil

#####Body

	nil

#####Parameters  

	"date" : "2016-05-18"
	
	explaination：  
	“2016-05-18”（日期的格式需要占位0）

#####Response
<pre><code>
{
  "dayinfo": {
    "album_id": "2",
    "date": "2016-05-18",
    "location": "Luzern,瑞士",
    "text": "我的心思不为谁而停留，我的征途是星辰大海",
    "song_name": "The Wolven Storm",
    "img_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-18.png",
    "music_url": "http://112.74.106.192/Beautiful_Day/music/2016-05-18.mp3",
    "page_url": "http://objccn.io/issue-19-0/"
  }
}
</pre></code>

***

<h2 id="1.1">fetch day info list
#####Description
获取日概要信息列表

#####Method

	// todo
	Post http://www.dev4love.com/api/daylist

#####Headers

	nil

#####Body

	nil

#####Parameters  

	"startdate" : "2016-05-18"
	"count" : 2
	explaination：  
	“2016-05-18”（日期的格式需要占位0）
	“startdate” 返回时包括该日期
	"count" 获取的个数
	返回数组应从该日期起往前逆序排列，如：4.14；4.13；4.12；4.11......
	

#####Response

<pre><code>
{
  "album_datas": [
    {
      "album_id": "2",
      "date": "2016-05-18",
      "location": "Luzern,瑞士",
      "text": "我的心思不为谁而停留，我的征途是星辰大海",
      "song_name": "The Wolven Storm",
      "img_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-18.png",
      "music_url": "http://112.74.106.192/Beautiful_Day/music/2016-05-18.mp3",
      "page_url": "http://objccn.io/issue-19-0/"
    },
    {
      "album_id": "3",
      "date": "2016-05-17",
      "location": "Melbourne,澳大利亚",
      "text": "我像波浪一样摇摆，在梦想的生活和生活过的梦之间",
      "song_name": "彩虹",
      "img_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-17.png",
      "music_url": "http://112.74.106.192/Beautiful_Day/music/2016-05-17.mp3",
      "page_url": "http://objccn.io/issue-1-0/"
    }
  ]
}
</pre></code>

***


<h2 id="2">fetch album detail info
#####Description
根据id获取地理日志详情

#####Method

	Post http://www.dev4love.com/api/albumdetail

#####Headers

	nil

#####Body

	nil

#####Parameters  

	"album_id" : 1或者2 (int),"user_id" : 1或者2或者3 (int)

#####Response
<pre><code>
{
  "zan": 1,
  "albuminfo": {
    "album_id": "2",
    "date": "2016-05-18",
    "location": "Luzern,瑞士",
    "text": "我的心思不为谁而停留，我的征途是星辰大海",
    "song_name": "The Wolven Storm",
    "img_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-18.png",
    "music_url": "http://112.74.106.192/Beautiful_Day/music/2016-05-18.mp3",
    "page_url": "http://objccn.io/issue-19-0/"
  },
  "commentlist": [
    {
      "album_id": 2,
      "content": "comment test 2016-05-24-2317",
      "user_id": 2
    },
    {
      "album_id": 2,
      "content": "111111111",
      "user_id": 3
    }
  ],
  "zanlist": [
    {
      "user_name": "lucy"
    },
    {
      "user_name": "lily"
    }
  ]
}
</code></pre>

***

<h2 id="3">zan
#####Description
点赞及取消点赞

#####Method

	Post http://www.dev4love.com/api/zan

#####Headers

	nil

#####Body

	nil

#####Parameters  

	"album_id" : 7438 (int)
	"zan" : 1 (int)
	"user_id" : 537 (int)
初期调试解释：	"album_id" : 1或者2 (int)
	"zan" : 1 (int)因为php里boolean存mysql里是tinyint，所以用int就可以了。然后只需要post 1给到我，第一次会返回zan ： 1，再post就会返回0，我这边做了判断。
	"user_id" : 1或者2或者3 (int)
#####Response

	{
	"success" : 1 (int)
	"zan" : {
			"zan_id" : 333 (int)
			"zan_status" : 1 (int)
			"album_id" : 4724 (int)
			"user_id" : 537 (int)
			“updated_at” : "2016-05-18 15:25"
			}
	}


***

<h2 id="4">comment
#####Description
发表评论

#####Method

	Post http://www.dev4love.com//api/comment
	

#####Headers

	nil

#####Body

	nil

#####Parameters  

	"album_id" : 1 (int)
	"content" : "bilibili"
	"user_id" : 2 (int)

#####Response

	{
	"success" : 1 (int)
	"comment" : {
			"comment_id" : 333 (int)
			"album_id" : 4724 (int)
			"content" : "bilibili"
			"user_id" : 537 (int)
			"user_name" : "xxxx"
			“created_at” : "2016-05-18 15:25"
			“updated_at” : "2016-05-18 15:25"
			}
	}
	
***

<h2 id="5">fetch comment list
#####Description
根据页码获取评论列表

#####Method

	Post http://112.74.106.192/Beautiful_Day/App/index.php

#####Headers

	nil

#####Body

	nil

#####Parameters  

	"album_id" : 4724 (int)
	"lastcommentid" : 7525 (int)
	"quantity" : 20 (int)

#####Response

	{
	"success" : YES (bool)
	"album_id" : 4724 (int)
	"quantity" : 20 (int)		
	"commentlist" : [
			{
			"user_name" : "jason"
			"content" : "bilibili"
			"comment_id" : 537 (int)
			“time” : "2016-04-14 15:25"
			},
			{
			"user_name" : "jason"
			"content" : "bilibili"
			"comment_id" : 537 (int)
			“time” : "2016-04-14 15:25"
			},
			...
		]
	}