from django.shortcuts import render
from Home.models import Articles,Сontacts,Header,ButtomPanel,Style
from .models import Content

# Create your views here.

def about(request):
    content = Content.objects.get(id = 1)
    header = Header.objects.get()
    contacts = [Сontacts.objects.get(id = i) for i in range(1, 6)]
    panel = ButtomPanel.objects.get()
    header = Header.objects.get()
    panel = ButtomPanel.objects.get()
    phone_str = contacts[3].contact
    version = Style.objects.get()
    phone = '<span>'+phone_str[0:2]+' ('+phone_str[2:5]+')</span>'+' '+phone_str[5:8]+'-'+phone_str[8:10]+'-'+phone_str[10:12]
    email_str = contacts[4].contact
    email = '<span>' + '</span><span>@'.join(email_str.split('@')) + '</span>'
    return render(request,'About/about.html',{'contact': contacts,
    'head':header, 'panel':panel,
    'Phone_contact':phone ,'Email_contact':email,'version':version.version_css,'content':content})
