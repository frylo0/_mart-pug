from django.shortcuts import render
from .models import Articles,Сontacts,Header
# Create your views here.
def home(request):
    art1 = Articles.objects.get(id = 1)
    art2 = Articles.objects.get(id = 2)
    art3 = Articles.objects.get(id = 3)
    art4 = Articles.objects.get(id = 4)
    art5 = Articles.objects.get(id = 5)
    art6 = Articles.objects.get(id = 6)
    art7 = Articles.objects.get(id = 7)
    cnt = Сontacts.objects.get(id = 1)
    cnt1 = Сontacts.objects.get(id = 2)
    cnt2 = Сontacts.objects.get(id = 3)
    cnt3 = Сontacts.objects.get(id = 4)
    cnt4 = Сontacts.objects.get(id = 5)
    header = Header.objects.get()
    return render(request, 'home/index.html',
    {'articles1':art1,'art2':art2, 'art3':art3, 'art4':art4, 'art5':art5, 'art6':art6, 'art7':art7,
   'ctn1':cnt, 'ctn2':cnt1, 'ctn3':cnt2, 'ctn4':cnt3, 'ctn5':cnt4, 'head':header})
