

const numPaths = document.querySelector('.numPaths');
const hidePath = document.querySelectorAll('.hidePath');
const path = document.querySelectorAll('.path');
const from = document.querySelectorAll('.from');
const to = document.querySelectorAll('.to');
var usedPaths = [];
var options = '<option></option>';

var blueStations = ['SABB','DR.SULAIMAN ALHABIB','KAFD','AL Murooj','King Fahad District','King Fahad District 2','STC','AL Wurud 2','Al Urubah','alinma bank','Bank Albilad','King Fahad Library','Ministry of Interior','Al Muorabba','Passport Department','National Mueseum','Al Battha','Qasr Al Hokm','Al Owd','Skirinah','Manfouhah','Al Iman Hospital','Transportation Center','Al Aziziah','Ad Dar Al Baida'];
var redStations = ['King Saud University','King Salman Osis','KACST','At Takhassussi','STC','Al Wurud','King Abdulaziz Road',' Ministry of Education','An Nuzhah','Riyadh Exhibitition Center','Khaled Bin Alwaleed Road','Al Hamra','Al Khaleej','CityCenter','King Fahad Stadium'];
var orangeStations = ['Jeddah Road','Tuwaiq','Ad Douh','Western Station','Aishah bint Abi Bakr Street','Dhahrat Al Badiah','Sultanah','Al Jarradiyah','Courts Complex','Qasr Al Hokm','Al Hilla','Al Margab','As Salhiyah','First Industrial City','Railway','Al Malaz','Jarir District','Al Rajhi Grand Mosque','Harun Ar Rashid Road','An Naseem','Hassan Bin Thabit Street','Khashm Al An'];
var yellowStations = ['KAFD','Ar Rabi','Uthman Bit Affan Road','Sabic','PNU','Governmental Copmlex','Military Medical Complex','Airport T5','Airport T3-4','Airport T1-2'];
var greenStations = ['Ministry of Education','Salahaddin','As Sulimaniyah','Ad Dabab','Abu Dhabi Square','Officers Club','GOSI','Al Wizarat','Ministry of Defense','MEW&A','Ministry of Finance','National Museum'];
var purpleStations = ['KAFD','Ar Rabi','Uthman Bin Affan Road','Sabic','Grandia','Al Yarmuk','Al Hamra','Al Andalus','Khurais Road','As Salam','An Naseem'];

try
{
numPaths.addEventListener('click',function(){

    for(let i = 0; i < 6; i++)
    {
        hidePath[i].style.cssText += "display: none !important;";

    }

    for(let i = 0; i < numPaths.value; i++)
    {
        hidePath[i].style.cssText += "display: flex !important;";
    }

    for(let i = numPaths.value; i < 6; i++)
    {
        try
        {
        path[i].value = "";
        from[i].value = "";
        to[i].value = "";
        }
        catch{}
    }
});
}
catch{}

for(let i = 0; i < path.length; i++)
path[i].addEventListener('click',function(){

    if(path[i].value == 'Blue')
    {
        getOptions('Blue',i);
    }
    else if(path[i].value == 'Red')
    {
        getOptions('Red',i);
    }
    else if(path[i].value == 'Orange')
    {
        getOptions('Orange',i);
    }
    else if(path[i].value == 'Yellow')
    {
        getOptions('Yellow',i);
    }
    else if(path[i].value == 'Green')
    {
        getOptions('Green',i);
    }
    else if(path[i].value == 'Purple')
    {
        getOptions('Purple',i);
    }
});

function getOptions(p,i)
{
    if(p == 'Blue')
    {
        var options = '<option></option>';
        for(let i = 11; i <= 35; i++)
        {
            options += '<option>'+blueStations[i-11]+' ('+ i +')'+'</option>'
        }
        from[i].innerHTML = options;
        to[i].innerHTML = options;
    }
    else if(p == 'Red')
    {
        var options = '<option></option>';
        for(let i = 11; i <= 25; i++)
        {
            options += '<option>'+redStations[i-11]+' ('+ i +')'+'</option>'
        }
        from[i].innerHTML = options;
        to[i].innerHTML = options;
    }
    else if(p == 'Orange')
    {
        var options = '<option></option>';
        for(let i = 11; i <= 32; i++)
        {
            options += '<option>'+orangeStations[i-11]+' ('+ i +')'+'</option>'
        }
        from[i].innerHTML = options;
        to[i].innerHTML = options;
    }
    else if(p == 'Yellow')
    {
        var options = '<option></option>';
        for(let i = 11; i <= 20; i++)
        {
            options += '<option>'+yellowStations[i-11]+' ('+ i +')'+'</option>'
        }
        from[i].innerHTML = options;
        to[i].innerHTML = options;
    }
    else if(p == 'Green')
    {
        var options = '<option></option>';
        for(let i = 11; i <= 22; i++)
        {
            options += '<option>'+greenStations[i-11]+' ('+ i +')'+'</option>'
        }
        from[i].innerHTML = options;
        to[i].innerHTML = options;
    }
    else if(p == 'Purple')
    {
        var options = '<option></option>';
        for(let i = 11; i <= 21; i++)
        {
            options += '<option>'+purpleStations[i-11]+' ('+ i +')'+'</option>'
        }
        from[i].innerHTML = options;
        to[i].innerHTML = options;
    }
}


for(let i = 0; i < path.length; i++)
path[i].addEventListener('click',function(){


    usedPaths = [];

    for(let j = 0; j < path.length; j++)
    usedPaths.push(path[j].value);
    console.log(usedPaths);

    for(let i = 0; i < 6; i++)
    {
        for(let j = 1; j < 7; j++)
        {
            path[i].children[j].disabled = false;
        }
    }

    for(let i=0; i < 6; i++)
    {
        if(usedPaths.includes('Blue'))
        {
            for(let i = 0; i < 6; i++)
            {
                for(let j = 1; j < 7; j++)
                {
                    if(path[i].children[j].innerHTML == 'Blue')
                    {
                        path[i].children[j].disabled = true;
                    }
                }
            }
        }
        if(usedPaths.includes('Red'))
        {
            for(let i = 0; i < 6; i++)
            {
                for(let j = 1; j < 7; j++)
                {
                    if(path[i].children[j].innerHTML == 'Red')
                    {
                        path[i].children[j].disabled = true;
                    }
                }
            }
        }
        if(usedPaths.includes('Orange'))
        {
            for(let i = 0; i < 6; i++)
            {
                for(let j = 1; j < 7; j++)
                {
                    if(path[i].children[j].innerHTML == 'Orange')
                    {
                        path[i].children[j].disabled = true;
                    }
                }
            }
        }
        if(usedPaths.includes('Yellow'))
        {
            for(let i = 0; i < 6; i++)
            {
                for(let j = 1; j < 7; j++)
                {
                    if(path[i].children[j].innerHTML == 'Yellow')
                    {
                        path[i].children[j].disabled = true;
                    }
                }
            }
        }
        if(usedPaths.includes('Green'))
        {
            for(let i = 0; i < 6; i++)
            {
                for(let j = 1; j < 7; j++)
                {
                    if(path[i].children[j].innerHTML == 'Green')
                    {
                        path[i].children[j].disabled = true;
                    }
                }
            }
        }
        if(usedPaths.includes('Purple'))
        {
            for(let i = 0; i < 6; i++)
            {
                for(let j = 1; j < 7; j++)
                {
                    if(path[i].children[j].innerHTML == 'Purple')
                    {
                        path[i].children[j].disabled = true;
                    }
                }
            }
        }
    }

});

for(let i = 0; i < to.length; i++)
to[i].addEventListener('click',function(){});

const singleForm = document.querySelector('#singleForm')

try
{
singleForm.addEventListener('submit',function(){

    for(let i = 0; i < 6; i++)
    {
        for(let j = 1; j < 7; j++)
        {
            path[i].children[j].disabled = false;
        }
    }
    
});
}
catch{}

try{
const totalCost = document.querySelector('#footerDetail a');
const costDetail = document.querySelector('#costDetail');

totalCost.addEventListener('click',function(){

    costDetail.classList.toggle('hideCostDetail');
});
}
catch{}