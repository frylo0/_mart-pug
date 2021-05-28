from django.db import models

# Create your models here.
class Meta:
    verbose_name = 'Страница о себе'
    

class Content(models.Model):
    text = models.TextField('текст')
    image = models.FileField('картинка',upload_to = 'media/image/')    
    icon = models.FileField('иконкa',upload_to = 'media/image/')
