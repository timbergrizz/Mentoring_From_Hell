import base64

encoding = "nimda"
cookie = '''Vm0wd%40QyUXlVWGxWV0d%5EV%21YwZDRWMVl%24WkRSV0%21WbDNXa%21JTVjAxV%40JETlhhMUpUVmpBeFYySkVUbGhoTVVwVVZtcEJlRll%26U%40tWVWJHaG9UVlZ%24VlZadGNFSmxSbGw%21VTJ0V%21ZXSkhhRzlVVmxaM%21ZsWmFjVkZ0UmxSTmJFcEpWbTEwYTFkSFNrZGpSVGxhVmpOU%21IxcFZXbUZrUjA%21R%21UyMTRVMkpIZHpGV%21ZFb%24dWakZhV0ZOcmFHaFNlbXhXVm%21wT%21QwMHhjRlpYYlVaclVqQTFSMXBGV%40xOVWJGcFlaSHBHVjFaRmIzZFdha%21poVjBaT%40NtRkhhRk%26sYlhoWFZtMHhORmxWTUhoWGJrNVlZbFZhY%40xWcVFURlNNVlY%21VFZSU%21ZrMXJjRWxhU0hCSFZqRmFSbUl%2AWkZkaGExcG9WakJhVDJOdFJraGhSazVzWWxob%21dGWnRNWGRVTVZGM%21RVaG9hbEpzY0ZsWmJGWmhZMnhXY%21ZGVVJsTk%26WbFkxVkZaU%21UxWnJNWEpqUld%5EaFUwaENTRlpxUm%21GU%40JVbDZXa%21prYUdFeGNHOVdha0poVkRKT%40RGSnJhR%40hTYXpWeldXeG9iMWRHV%40%26STldHUlZUVlpHTTFSVmFHOWhiRXB%2AWTBac%21dtSkdXbWhaTVZwaFpFZFNTRkpyTlZOaVJtOTNWMnhXYjJFeFdYZE%26WVlpUWVRGd%21YxbHJXa%24RUUmxweFVtMUdVMkpWYkRaWGExcHJZVWRGZUdOSE9WZGhhMHBvVmtSS%21QyUkdTbkpoUjJoVFlYcFdlbGRYZUc%26aU%21XUkhWMjVTVGxOSGFGQlZiVEUwVmpGU%21ZtRkhPVmhTTUhCNVZHeGFjMWR0U%40tkWGJXaGFUVzVvV0ZreFdrZFdWa%24B%2AVkdzMVYwMVZiekZXYlhCS%21RWZEZlRmRZWkU%21V%21ZscFVXV%24RrVTFsV%21VsWlhiVVpPVFZad%40VGVXlkREJXTVZweVkwWndXR0V%5EY0ROV%40FrWkxWakpPU%21dKR%21pGZFNWWEJ%40Vm%210U%21MxUXlUWGxVYTFwb%21VqTkNWRmxZY0ZkWFZscFlZMFU%21YVUxcmJEUldNalZUVkd%5Ea%21NGVnNXbFZXYkhCWVZHdGFWbVZIUmtoUFYyaHBVbGhDTmxkVVFtRmpNV%21IwVTJ0a%21dHSlhhR0ZVVnpWdlYwWnJlRmRyWkZkV%40EzQjZWa%40R%2ATVZkR%21NsWmpSV%24hYWWxoQ%21RGUnJXbEpsUm%21SellVWlNhRTFzU%40%26oV%21Z%2AQjRUa%40RHUjFaWVpHaFNWVFZWVlcxNGQyVkdWblJOVldSV%21RXdHdWMWxyVW%21GWFIwVjRZMGhLV%40xaWFVrZGFWV%21JQVTBVNVYxcEhhR%40hOU0VKMlZtMTBVMU%21%5EVVhsVmEyUlZZbXR%24YUZWdGVFdGpSbHB%5EVkcwNVYxWnNjRWhYVkU%21dllWVXhXRlZ%21Y0ZkTlYyaDJWMVphUzFJeFRuVlJiRlpYVFRGS0%26sWkdVa%40RWTVZwMFVtdG9VRlp0YUZSVVZXaERVMnhhYzFwRVVtcE%26WMUl%24VlRKMGExZEhTbGhoUjBaVlZucFdkbFl%24V%40%26KbFJtUnlXa%21prVjJFelFqWldhMlI%40VFZaWmVWTnJaR%40hOTW%21oWVdWUkdkMkZHV%40xWU%40JGcHNVbTFTTVZVeWN%2ARlhSa%24BaVVc%21b%21YxWXphSEpVYTJSSFVqRmFXVnBIYUZOV%21ZGWldWbGN%5ETkdReVZrZFdXR%24hyVWpCYWNGVnRlSGRsYkZsNVpVaGtXRkl%24VmpSWk%21GSlBWMjFGZVZWclpHRldNMmhJV%21RJeFMxSXhjRWhpUm%21oVFZsaENTMVp0TVRCVk%21VMTRWbGhvV0ZkSGFGbFpiWGhoVm%21%5Ec%40NscEhPV%24BTYkhCNFZrY%24dOVll%5EV%40%26OalJXaFlWa%21UxZGxsV%21ZYaFhSbFp%26WVVaa%21RtRnNXbFZXYTJRMFdWWktjMVJ%21VG%21oU%40JGcFlXV%24hhUm%21ReFduRlJiVVphVm0xU%21NWWlhkRzloTVVwMFlVWlNWVlpXY0dGVVZscGhZekZ%24UlZWdGNFNVdNVWwzVmxSS0%21HRXhaRWhUYkdob%21VqQmFWbFp0ZUhkTk%21WcHlWMjFHYWxacmNEQmFSV%21F%24VmpKS%40NsTnJhRmRTTTJob%21ZrUktSMVl%5EVG%26WVmJFSlhVbFJXV%21ZaR%21l%2ARmlNV%21JIWWtaV%21VsZEhhRlJVVm%21SVFpXeHNWbGRzVG%21oU%21ZFWjZWVEkxYjFZeFdYcFZiR%40hZVm%21%5Ed%21lWcFZXbXRrVmtwelZtMXNWMUl%2AYURWV0%21XUXdXVmRSZVZaclpGZGliRXB%26Vld0V%21MySXhiRmxqUldSc%21ZteEtlbFp0TURWWFIwcEhZMFpvV%40sxSGFFeFdNbmhoVjBaV%40NscEhSbGROTW%21oSlYxUkplRk%21%5EU%21hoalJXUmhVbXMxV0ZZd%21ZrdE%26iRnAwWTBWa%21dsWXdWalJXYkdodlYwWmtTR0ZHV%40xwaVdHaG9WbTE0YzJOc%21pISmtSM0JUWWtad0%26GWlhNVEJOUmxsNFYyNU9hbEpYYUZoV%40FrNVRWRVpzVlZGWWFGTldhM0I%40VmtkNFlWVXlTa%21pYV0hCWFZsWndSMVF%5EV%40tOVmJFSlZUVVF%24UFE9PQ%3D%3D'''

for i in range(20) :
    encoding = base64.b64encode(encoding)


encoding = encoding.replace("1","!")
encoding = encoding.replace("2","@")
encoding = encoding.replace("3","$")
encoding = encoding.replace("4","^")
encoding = encoding.replace("5","&")
encoding = encoding.replace("6","*")
encoding = encoding.replace("7","(")
encoding = encoding.replace("8",")")

print(encoding)

'''
print(str(encoding) == cookie)

cookie = cookie.replace("!","1")
cookie = cookie.replace("@","2")
cookie = cookie.replace("$","3")
cookie = cookie.replace("^","4")
cookie = cookie.replace("&","5")
cookie = cookie.replace("*","6")
cookie = cookie.replace("(","7")
cookie = cookie.replace(")","8")

for i in range(20) :
    cookie = base64.b64decode(cookie)

print(cookie)


  #$val_id=str_replace("1","!",$val_id);
  #$val_id=str_replace("2","@",$val_id);
  #$val_id=str_replace("3","$",$val_id);
  #$val_id=str_replace("4","^",$val_id);
  #$val_id=str_replace("5","&",$val_id);
  #$val_id=str_replace("6","*",$val_id);
  #$val_id=str_replace("7","(",$val_id);
  #$val_id=str_replace("8",")",$val_id);
  '''