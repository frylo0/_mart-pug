from django.db import models

# Create your models here.

class Articles(models.Model):
    id = models.IntegerField("номер (лучше не трогать)",primary_key=True)
    title = models.CharField('заголовок', max_length = 200)
    text = models.TextField('текст')
    icon = models.CharField('имя иконки(вместе с расширением)', max_length = 300)
    location = models.CharField("п или л",max_length = 1)



class Сontacts(models.Model):
    id = models.IntegerField("номер (лучше не трогать)",primary_key=True)
    contact = models.CharField("контакт",max_length = 300)
    icon = models.CharField('имя иконки(вместе с расширением)', max_length = 300)
