from django.shortcuts import render


def calculate_bill(request):
    if request.method == 'POST':
        units = int(request.POST.get('units'))
        total = 0

        if units <= 50:
            total = units * 3.5
        elif units <= 150:
            total = (50 * 3.5) + ((units - 50) * 4)
        elif units <= 250:
            total = (50 * 3.5) + (100 * 4) + ((units - 150) * 5.2)
        else:
            total = (50 * 3.5) + (100 * 4) + (100 * 5.2) + ((units - 250) * 6.5)

        context = {
            'units': units,
            'total': total,
        }
        return render(request, 'result.html', context)

    return render(request, 'index.html')