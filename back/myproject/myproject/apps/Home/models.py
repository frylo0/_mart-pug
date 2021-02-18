from django.db import models

# Create your models here.

class Header(models.Model):
    name = models.CharField('имя на шапке',max_length = 300)
    title = models.CharField('заголовок на шапке',max_length = 300)
    icon_header = models.ImageField('фотка в шапке',upload_to = 'image/')
    def __str__(self):
        return self.name

class Articles(models.Model):
    id = models.IntegerField("номер (лучше не трогать)",primary_key=True)
    title = models.CharField('заголовок', max_length = 200)
    text = models.TextField('текст')
    icon = models.FileField('иконки',upload_to = 'media/image/')
    image = models.FileField('картинка',upload_to = 'media/image/')
    location = models.BooleanField('картинка слева?',default = False)
    def __str__(self):
        return self.title


class Сontacts(models.Model):
    id = models.IntegerField("номер (лучше не трогать)",primary_key=True)
    contact = models.CharField("контакт",max_length = 300)
    icon = models.FileField('имя иконки(вместе с расширением)',upload_to = 'image/')
    def __str__(self):
        return self.contact
