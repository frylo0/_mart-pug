from django.db import models

# Create your models here.

class Meta:
    verbose_name = 'Главная страница'


class Header(models.Model):
    name = models.CharField('имя на шапке',max_length = 300)
    title = models.CharField('заголовок на шапке',max_length = 300)
    icon_header = models.ImageField('фотка в шапке',upload_to = 'media/image/')
    def __str__(self):
        return self.name

    class Meta:
        verbose_name = 'Шапка'
        verbose_name_plural = 'Шапка'

class Articles(models.Model):
    id = models.IntegerField("номер (лучше не трогать)",primary_key=True)
    title = models.CharField('заголовок', max_length = 200)
    text = models.TextField('текст')
    icon = models.FileField('иконки',upload_to = 'media/image/')
    image = models.FileField('картинка',upload_to = 'media/image/')
    location = models.BooleanField('картинка слева?',default = False)
    def __str__(self):
        return self.title

    class Meta:
        verbose_name = 'Секции'
        verbose_name_plural ='Секции'


class Сontacts(models.Model):
    id = models.IntegerField("номер (лучше не трогать)",primary_key=True)
    contact = models.CharField("контакт",max_length = 300)
    icon = models.FileField('имя иконки(вместе с расширением)',upload_to = 'media/image/')
    def __str__(self):
        return self.contact

    class Meta:
        verbose_name = 'Контакты'
        verbose_name_plural = 'Контакты'

class ButtomPanel(models.Model):
    left_text = models.CharField('текст в нижней панели',max_length = 400)
    def __str__(self):
        return 'Нижняя панель'

    class Meta:
        verbose_name = 'Нижняя панель'
        verbose_name_plural = 'Нижняя панель'

class Style(models.Model):
    version_css = models.CharField('версия css',max_length = 500)

    class Meta:
        verbose_name = 'Версия'
        verbose_name_plural = 'Версия'
