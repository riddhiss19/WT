from django.urls import path
from . import views

urlpatterns = [
    path('', views.calculate_bill, name='calculate_bill'),
]