from django.shortcuts import render

def calculate_bill(request):
    if request.method == 'POST':
        units = int(request.POST.get('units', 0))
        if units <= 50:
            bill = units * 3.50
        elif units > 50 and units <= 150:
            bill = (50 * 3.50) + ((units - 50) * 4.00)
        elif units > 150 and units <= 250:
            bill = (50 * 3.50) + (100 * 4.00) + ((units - 150) * 5.20)
        else:
            remaining_units = units - 250
            bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + ((units - 250) * 6.50)
        context = {
            'units': units,
            'bill': bill,
            'remaining_units': remaining_units if units > 250 else None,
        }
        return render(request, 'result.html', context)
    return render(request, 'index.html')