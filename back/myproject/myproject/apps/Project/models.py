from django.db import models

# Create your models here.
class Meta:
    verbose_name = 'Страница о проекте'
    

class Content(models.Model):
    text = models.TextField('текст')
    image = models.FileField('картинка',upload_to = 'media/image/')    
    icon = models.FileField('иконкa',upload_to = 'media/image/')
    def __str__(self):
        return 'Контент'
    
    class Meta:
        verbose_name = 'контент'
        verbose_name_plural = 'контент'
