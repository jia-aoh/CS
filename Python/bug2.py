from selenium import webdriver
from bs4 import BeautifulSoup
import requests

#### Chrome
driver = webdriver.Chrome()

driver.implicitly_wait(15)
driver.get('https://www.91toy.com.tw/search?category=hot')
soup = BeautifulSoup(driver.page_source, 'html.parser')
imgs = soup.find_all('img', class_='img_pixel ls-is-cached lazyloaded')
print(len(imgs))
srcList = []
for img in imgs :
    srcList.append(img.get('src'))
print(srcList)

driver.quit()