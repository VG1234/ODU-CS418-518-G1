pip install summa
from summa import summarizer
from summa import keywords
import json
import urllib.request
# import urlib2,cookielib
hdr = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36',
       'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
       'Accept-Charset': 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
       'Accept-Encoding': 'none',
       'Accept-Language': 'en-US,en;q=0.8',
       'Connection': 'keep-alive'}
data2 = json.loads(uploaded["testing.json"])
# data2[0]['title']+data2[0]['description']
type(data2)
for i in data2:
  print('title:::\t'+i['title']+ '\n\n')
  text = i['title']+i['description']+i['subtitle']
  text_data= keywords.keywords(text);
  # print(summarizer.summarize(text),'\n')
  final_data = '';
  text_data_split = text_data.split()
  for j in text_data_split:
    final_data = final_data+'+'+ j ;
    # print(final_data)
  weburl = urllib.request.urlopen('https://api.semanticscholar.org/graph/v1/paper/search?query='+final_data)
  # weburl = urllib2.Request('https://api.semanticscholar.org/graph/v1/paper/search?query='+final_data, headers=hdr)
  # print(weburl)
  paper_lookup_data = weburl.read()
  # paper_lookup_json_data = json.loads(paper_lookup_data)['data']
  # print(paper_lookup_json_data)
  look_d1 = []
  for k in json.loads(paper_lookup_data)['data']:
    lookup1_url = urllib.request.urlopen('https://api.semanticscholar.org/graph/v1/paper/'+k['paperId']+'?fields=title,citations,authors,abstract,year')
    final_lookup_paperid_data = lookup1_url.read()
    # print(final_lookup_paperid_data)
    look_d1.append(final_lookup_paperid_data)
    # print(look_d1)
    output='"relevantpapers":'
  for m in look_d1:
    jdata6 = json.loads(m)
    # print(jdata6)
    ho1 = ''
    for p in jdata6['authors']:
      ho1 = ho1+p['name']+','
    output+='{"title":'+'"'+str(jdata6['title'])+'"'
    output+=',"url":'+'""'
    output+=',"authors":'+'"'+str(ho1[:-1])+'"'
    output+=',"journal":'+'""'
    output+=',"year":'+'"'+str(jdata6['year'])+'"'
    output+=',"citations":'+'"'+str(len(jdata6['citations']))+'"'
    output+=',"claim":'+'"'+str(jdata6['abstract'])+'"'
    output+='},'
  print(output)
  print('\n\n')