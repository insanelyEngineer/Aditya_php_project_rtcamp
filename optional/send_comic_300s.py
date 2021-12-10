from selenium import webdriver
import time

browser = webdriver.Chrome(executable_path=r"C:\Users\Aditya\.wdm\drivers\chromedriver\win32\96.0.4664.45\chromedriver.exe")
browser.get("http://localhost/test/comic_sender.php")
while True:
    time.sleep(300)
    browser.refresh()