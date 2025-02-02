import datetime
from random import choice
import telebot
import requests

token = "7470055714:AAHRoGl9pBP7DPEuYizoTLJPX4hItm2aUPs"

bot = telebot.TeleBot(token)

RANDOM_TASKS = ['Написать Гвидо письмо', 'Выучить Python', 'Записаться на курс в Нетологию', 'Посмотреть 4 сезон Рик и Морти']

todos = dict()

HELP = '''
Список доступных команд:
* show  - напечать задачи на заданную дату
* showAll - напечать все задачи из списка
* todo - добавить задачу
* random - добавить на сегодня случайную задачу
* pogoda - вывод текущей погоды по городу Невьянск
* time - вывод текущего времени
* help - Напечатать help
'''
def add_todo(date, task):
    date = date.lower()
    if todos.get(date) is not None:
        todos[date].append(task)
    else:
        todos[date] = [task]

@bot.message_handler(commands=['help'])
def help(message):
    bot.send_message(message.chat.id, HELP)

@bot.message_handler(commands=['random'])
def random(message):
    task = choice(RANDOM_TASKS)
    add_todo('сегодня', task)
    bot.send_message(message.chat.id, f'Задача {task} добавлена на сегодня')

@bot.message_handler(commands=['add'])
def add(message):
    _, date, tail = message.text.split(maxsplit=2)
    task = ' '.join([tail])
    add_todo(date, task)
    bot.send_message(message.chat.id, f'Задача {task} добавлена на дату {date}')

@bot.message_handler(commands=['show'])
def show(message):
    date = message.text.split()[1].lower()
    if date in todos:
        tasks = ''
        for task in todos[date]:
            tasks += f'{task}\n'
    else:
        tasks = 'Такой даты нет'
    bot.send_message(message.chat.id, tasks)

@bot.message_handler(commands=['showAll'])
def show(message):
    tasks = ''
    for task in todos.values():
        tasks += f'{task}\n'
    bot.send_message(message.chat.id, f'Все актуальные задачи из списка: {task}')

def get_weather():
    # api_key = 'YOUR_API_KEY'
    base_url = 'https://api.openweathermap.org/data/2.5/weather?id=1497795&units=metric&appid=6c159b3707002416418d81c6dc4553b5&lang=ru'
    # params = {'q': city, 'appid': api_key, 'units': 'metric'}
    
    response = requests.get(base_url)
    weather_data = response.json()
    return weather_data

@bot.message_handler(commands=['pogoda'])
def get_weather_command(message):
    user_city = 'городе Невьянск'  # Замените на город, указанный пользователем
    weather_data = get_weather()
    
    # Обработка данных о погоде и отправка пользователю
    temperature = weather_data['main']['temp']
    description = weather_data['weather'][0]['description']
    wind = weather_data['wind']['speed'] 
    pressure = weather_data['main']['pressure'] * 0.75
    
    bot.send_message(message.chat.id, f"Погода в {user_city}:\n температура: {temperature}°C,\n ветер: {wind} м/с,\n давление: {pressure} мм рт. ст.,\n {description}")   

@bot.message_handler(commands=['time'])
def show(message):
    res = datetime.datetime.now().strftime ('%Y-%m-%d %H:%M:%S')
    bot.send_message(message.chat.id, f"Текущее время: {res}")

bot.infinity_polling(none_stop=True)