#coding:utf-8
import sys  
reload(sys)  
sys.setdefaultencoding('utf8')

import urllib
import urllib2
url = "http://www.xjr7670.com/admin/login.php?referer=http://www.xjr7670.com/admin/"
user_agent = "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0"
values = {'name':'admin', 'password':'x45668668'}
headers = {'User-Agent': user_agent, 'Referer': 'http://www.xjr7670.com/articles'}
data = urllib.urlencode(values)
request = urllib2.Request(url, data, headers)
response = urllib2.urlopen(request)
open("hh.html", "w").write(response.read())
