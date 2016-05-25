# BeautifulDay

##Directory  
* ####[register](#0)
* ####[fetch one day info](#1)  
* ####[fetch day info list](#1.1)  
* ####[fetch album detail info](#2)
* ####[zan](#3)
* ####[comment](#4)  
* ####[fetch comment list](#5)
 
 

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
使用第三方进行注册，之后默认登录

#####Method

	// todo
	Post http://112.74.106.192/Beautiful_Day/App/index.php

#####Headers

	nil

#####Body   

	nil

#####Parameters  

	"user_id" : 4573 (int)
	"user_name" : "jason"
	"user_img" : "url"
	// todo

#####Response

	{
	"success" : YES (bool)
	}

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

	"date" : "2016-04-14"
	
	explaination：  
	“2016-04-14”（日期的格式需要占位0）

#####Response
<pre><code>
{
  "dayinfo": {
    "album_id": 1,
    "date": "2016-05-18",
    "text": "justfortest",
    "img_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-18.png",
    "music_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-18.mp3",
    "page_url": "http://www.mafengwo.cn/i/5382755.html"
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

	"startdate" : "2016-04-14"
	"count" : 10
	explaination：  
	“2016-04-14”（日期的格式需要占位0）
	“startdate” 返回时包括该日期
	"count" 获取的个数
	返回数组应从该日期起往前逆序排列，如：4.14；4.13；4.12；4.11......
	

#####Response

<pre><code>
{
  "album_datas": [
    {
      "album_id": 1,
      "date": "2016-05-18",
      "text": "justfortest",
      "img_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-18.png",
      "music_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-18.mp3",
      "page_url": "http://www.mafengwo.cn/i/5382755.html"
    },
    {
      "album_id": 2,
      "date": "2016-05-17",
      "text": "test",
      "img_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-17.png",
      "music_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-17.mp3",
      "page_url": "http://www.mafengwo.cn/i/5382755.html"
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

	"album_id" : 4938 (int),"user_id" : 23 (int)

#####Response
<pre><code>
{
  "zan": 1,
  "albuminfo": {
    "album_id": 2,
    "date": "2016-05-17",
    "text": "test",
    "img_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-17.png",
    "music_url": "http://112.74.106.192/Beautiful_Day/image/2016-05-17.mp3",
    "page_url": "http://www.mafengwo.cn/i/5382755.html"
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

	Post http://112.74.106.192/Beautiful_Day/App/zan

#####Headers

	nil

#####Body

	nil

#####Parameters  

	"album_id" : 7438 (int)
	"zan" : YES (bool)
	"user_id" : 537 (int)

#####Response

	{
	"zan" : NO (bool)
	"timeStamp" : 474347384 (double) 
	}


***

<h2 id="4">comment
#####Description
发表评论

#####Method

	Post http://112.74.106.192/Beautiful_Day/App/comment

#####Headers

	nil

#####Body

	nil

#####Parameters  

	"album_id" : 4724 (int)
	"content" : "bilibili"
	"user_id" : 537 (int)

#####Response

	{
	"success" : YES (bool)
	"comment" : {
			"album_id" : 4724 (int)
			"content" : "bilibili"
			"user_id" : 537 (int)
			"user_name" : "xxxx"
			“time” : "2016-04-14 15:25"
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