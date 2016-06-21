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

2. fetch album detail info comment list 逆序
4. album info中添加了location和song_name两个字段
6. zan的结构调整，涉及到zan，fetch album detail info这几个接口（todo）
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

	"uid" : "18468523654" //手机号码
	"user_name" : "jason"
	"password" : "xxxxxxx"
	// todo

#####Response
uid已被注册过，返回
<pre><code>
{
  "status": "occupied"
}
</pre></code>

注册成功则返回

	{
	  "status": "success",
	  "user_id": 38,
	  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOm51bGwsImlzcyI6Imh0dHA6XC9cL2hvbWVzdGVhZC5hcHBcL2FwaVwvcmVnaXN0ZXIiLCJpYXQiOjE0NjYyNjg0NDMsImV4cCI6MTQ2NjI3MjA0MywibmJmIjoxNDY2MjY4NDQzLCJqdGkiOiIyOGU2ZmIxMzk3NTg2MTZjYmJmYWE0OTRkMjI4OGZjNCJ9.5swKoCAV3uJWWFZ4ZKcULBaBFc6ZlD7lutWsgthlHYE"
	}


***

<h2 id="0.1">Login
#####Description
用户登录


#####Method

	// todo
	Post http://www.dev4love.com/api/login

#####Headers

	nil

#####Body   

	nil

#####Parameters  


	"uid" : "18468523654" //手机号码
	"password" : "xxxxxxx"
	// todo

#####Response
登录密码错误返回
{
  "status": "wrong_password"
}

登录账户错误返回
{
  "status": "unregister"
}


登录成功则返回

	{
	  "status": "success",
	  "user_id": 13,
	  "user_name": "test4321",
	  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOm51bGwsImlzcyI6Imh0dHA6XC9cLzExMi43NC4xMDYuMTkyXC9hcGlcL2xvZ2luIiwiaWF0IjoxNDY2NDEyNzE2LCJleHAiOjE0NjY0MTYzMTYsIm5iZiI6MTQ2NjQxMjcxNiwianRpIjoiNmY3ZmVhNzM4ZDhlYzc2Mjk2NGRkNTM5OGRjMTEyOGIifQ.q_ohIm-8oN0-4ioN5tihXTNW_EHpiWS2_UGlWXhiCJc"
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

	"date" : "2016-05-18"
	
	explaination：  
	“2016-05-18”（日期的格式需要占位0）

#####Response

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
      "comment_id": 11,
      "album_id": 2,
      "content": "这个世界还好吗",
      "user_id": 8,
      "user_name": "yangce2",
      "created_at": "2016-06-04 02:46:42",
      "updated_at": "2016-06-04 02:46:42"
    },
    {
      "comment_id": 10,
      "album_id": 2,
      "content": "这个世界还好吗",
      "user_id": 8,
      "user_name": "yangce2",
      "created_at": "2016-06-04 02:45:30",
      "updated_at": "2016-06-04 02:45:30"
    },
    {
      "comment_id": 4,
      "album_id": 2,
      "content": "111111111",
      "user_id": 3,
      "user_name": "lucy",
      "created_at": "2016-05-25 17:31:22",
      "updated_at": "2016-05-25 17:31:22"
    },
    {
      "comment_id": 1,
      "album_id": 2,
      "content": "comment test 2016-05-24-2317",
      "user_id": 2,
      "user_name": "john",
      "created_at": "2016-05-24 05:31:22",
      "updated_at": "2016-05-24 05:31:22"
    }
  ],
  "zanlist": [
    {
      "zan_id": 29,
      "album_id": 2,
      "zan": 1,
      "user_id": 4,
      "created_at": "2016-06-21 20:32:36",
      "updated_at": "2016-06-21 20:32:36",
      "user_name": null
    },
    {
      "zan_id": 30,
      "album_id": 2,
      "zan": 1,
      "user_id": 8,
      "created_at": "2016-06-21 20:32:48",
      "updated_at": "2016-06-21 20:32:48",
      "user_name": "yangce2"
    },
    {
      "zan_id": 28,
      "album_id": 2,
      "zan": 1,
      "user_id": 3,
      "created_at": "2016-06-21 20:27:18",
      "updated_at": "2016-06-21 20:34:11",
      "user_name": "lucy"
    }
  ]
}


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

#####Response


	{
	  "success": "1",
	  "zaninfo": {
	    "zan_id": 27,
	    "album_id": 3,
	    "zan": 0,(0表示未点赞，1表示已点赞)
	    "user_id": 8,
	    "created_at": "2016-06-21 20:17:56",
	    "updated_at": "2016-06-21 20:19:06",
	    "user_name": "yangce2"
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

	Post http://www.dev4love.com/api/commentlist

#####Headers

	nil

#####Body

	nil

#####Parameters  

	"album_id" : 2 (int)
	"onepage_maxcomment" : 5 (int)
	"pagination" : 3 (int)

######onepage_maxcomment为每页的的最大显示评论数。pagination为当前页面的页码

#####Response

	{
	  "Success": 1,
	  "album_id": "2",
	  "pagination": "3",
	  "comment": [
	    {
	      "comment_id": "20",
	      "album_id": "2",
	      "content": "hello,this is from jason",
	      "user_id": "1",
	      "user_name": "Lily",
	      "created_at": "2016-05-30 21:05:36",
	      "updated_at": "2016-05-30 21:05:36"
	    },
	    {
	      "comment_id": "19",
	      "album_id": "2",
	      "content": "hello,this is from jason",
	      "user_id": "1",
	      "user_name": "Lily",
	      "created_at": "2016-05-30 21:05:36",
	      "updated_at": "2016-05-30 21:05:36"
	    },
	    {
	      "comment_id": "18",
	      "album_id": "2",
	      "content": "hello,this is from jason",
	      "user_id": "1",
	      "user_name": "Lily",
	      "created_at": "2016-05-30 21:05:36",
	      "updated_at": "2016-05-30 21:05:36"
	    },
	    {
	      "comment_id": "17",
	      "album_id": "2",
	      "content": "hello,this is from jason",
	      "user_id": "1",
	      "user_name": "Lily",
	      "created_at": "2016-05-30 21:05:36",
	      "updated_at": "2016-05-30 21:05:36"
	    },
	    {
	      "comment_id": "16",
	      "album_id": "2",
	      "content": "hello,this is from jason",
	      "user_id": "1",
	      "user_name": "Lily",
	      "created_at": "2016-05-30 21:05:35",
	      "updated_at": "2016-05-30 21:05:35"
	    }
	  ]
	}