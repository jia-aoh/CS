import requests

idx = 0
for i in ['01', '02', '03', '04', '05', '06', '07', '08', '09'] :
    idx += 1
    url = 'https://www.cwa.gov.tw/V8/assets/img/weather_icons/weathers/svg_icon/day/' + i + '.svg'
    path = 'C:/xampp/htdocs/RESTful/_img' + str(idx) + '.svg'
    res = requests.get(url, stream=True)
    if res.status_code == 200:
        with open(path,'wb') as file_path:
            for chunck in res:
                file_path.write(chunck)
        print("The Image has been downloaded")
    else:
        print("Error!! HTTP Request failed")

for i in range(10, 43) :
    url = 'https://www.cwa.gov.tw/V8/assets/img/weather_icons/weathers/svg_icon/day/' + str(i) + '.svg'
    path = 'C:/xampp/htdocs/RESTful/_img' + str(i) + '.svg'
    res = requests.get(url, stream=True)
    if res.status_code == 200:
        with open(path,'wb') as file_path:
            for chunck in res:
                file_path.write(chunck)
        print("The Image has been downloaded")
    else:
        print("Error!! HTTP Request failed")
