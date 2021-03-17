# Generated by Django 2.2.16 on 2021-02-18 22:21

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Articles',
            fields=[
                ('id', models.IntegerField(primary_key=True, serialize=False, verbose_name='номер (лучше не трогать)')),
                ('title', models.CharField(max_length=200, verbose_name='заголовок')),
                ('text', models.TextField(verbose_name='текст')),
                ('icon', models.FileField(upload_to='media/image/', verbose_name='иконки')),
                ('image', models.FileField(upload_to='media/image/', verbose_name='картинка')),
                ('location', models.BooleanField(default=False, verbose_name='картинка слева?')),
            ],
        ),
        migrations.CreateModel(
            name='ButtomPanel',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('left_text', models.CharField(max_length=400, verbose_name='текст в нижней панели')),
            ],
        ),
        migrations.CreateModel(
            name='Header',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=300, verbose_name='имя на шапке')),
                ('title', models.CharField(max_length=300, verbose_name='заголовок на шапке')),
                ('icon_header', models.ImageField(upload_to='image/', verbose_name='фотка в шапке')),
            ],
        ),
        migrations.CreateModel(
            name='Сontacts',
            fields=[
                ('id', models.IntegerField(primary_key=True, serialize=False, verbose_name='номер (лучше не трогать)')),
                ('contact', models.CharField(max_length=300, verbose_name='контакт')),
                ('icon', models.FileField(upload_to='media/image/', verbose_name='имя иконки(вместе с расширением)')),
            ],
        ),
    ]
