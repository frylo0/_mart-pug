from django.shortcuts import render
from django.shortcuts import redirect
from .models import Articles,Сontacts,Header,ButtomPanel
# Create your views here.
def home(request):
    article_main = Articles.objects.get(id = 1)
    articles = [Articles.objects.get(id = i) for i in range(2, 8)]
    contacts = [Сontacts.objects.get(id = i) for i in range(1, 6)]
    header = Header.objects.get()
    panel = ButtomPanel.objects.get()
    phone_str = contacts[3].contact
    phone = '<span>'+phone_str[0:2]+' ('+phone_str[2:5]+')</span>'+' '+phone_str[5:8]+'-'+phone_str[8:10]+'-'+phone_str[10:12]
    email_str = contacts[4].contact
    email = '<span>' + '</span><span>@'.join(email_str.split('@')) + '</span>'
    print(phone)
    return render(request, 'home/index.html',
    {'article_main': article_main, 'articles': articles, 
     'contact': contacts, 
     'head':header, 'panel':panel, 
     'Phone_contact':phone ,'Email_contact':email })


def my_redirect(request):
    return redirect('/home/')
