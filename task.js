let name            = document.getElementById('high')
let checkbox        = document.getElementById('task_done')
let current_task    = localStorage.getItem('Current_Task')
const foot          = document.getElementById('footer')
let print           = document.getElementById('listOfTasks')
let printCurr       = document.getElementById('TaskToday')
let desc            = document.getElementById('Desc')
let link            = document.getElementById('link')



class TaskBar {
    //Start the app with getting the users current task
    getCurrentTask()
    {
        //if there is no current task, it will start to get the universal task of this app (Task that every user of this app is doing
        if (current_task === null)
        {
            const day = dd
            const month = mm
            localStorage.setItem('Day', dd)
            localStorage.setItem('Month', mm)
            let stringified = JSON.parse(localStorage.getItem("Tasks"));
            let CurrentT = (stringified.dailyTasks.find(o => o.Day === day) );
            localStorage.setItem('Current_Task',CurrentT.Task)

        }
        //if there is a local storage of a previous task, this will update it to the current task at hand (this works in-case the app is offline)
        else
        {
            const newday = dd
            const newmonth = mm
            const oldDay   = localStorage.getItem('Day')
            const oldmonth = localStorage.getItem('Month')
            const increment = newday - oldDay
            const a = Number(oldDay) + Number(increment)
            let string = JSON.parse(localStorage.getItem("Tasks"));
            let CurrentT = (string.dailyTasks.find(o => o.Day === String(a)));
            localStorage.setItem('Current_Task',CurrentT.Task)

            localStorage.setItem('Day', newday)
            localStorage.setItem('Month', newmonth)

        }
    }
    // This sets the current Task saved to local data to its user

    setCurrentTask()
    {
        let stringified = JSON.parse(localStorage.getItem("Task_doer"));
        const no = localStorage.getItem('name')
        const yes = localStorage.getItem('Current_Task')
        stringified.push({ name : no , TaskDone : yes });
        localStorage.setItem('Task_doer',JSON.stringify(stringified))


    }

    setName()
    {

        name.innerText    =  '-- Welcome '+ localStorage.getItem('name')  + '--'


    }
    isEmpty(obj) {
        return Object.keys(obj).length === 0;
    }
    printTable()
    {
        let string = JSON.parse(localStorage.getItem("Task_doer"));

        for (let x = 0 ; x < string.length ; ++x)
        {
            if (string[x].name !== localStorage.getItem('name'))
            {
                print.innerText =  'You currently have no Tasks done, step it up! '+ String.fromCodePoint(0x1F354);
            }
        }

        foot.innerText = 'Tasks Done By '+ localStorage.getItem('name')+ ' ' + String.fromCodePoint(0x1F4AA)
        if (this.isEmpty(JSON.parse(localStorage.getItem("Task_doer"))) === true)
        {

            print.innerText =  'You currently have no Tasks done, step it up! '+ String.fromCodePoint(0x1F354);
        }
        else
        {
            let string = JSON.parse(localStorage.getItem("Task_doer"));
            let new_s = ''
            for (let x = 0 ; x < string.length ; ++x)
            {
                if (string[x].name === localStorage.getItem('name'))
                {
                    new_s += (string[x].TaskDone )+ '<br>'
                    print.innerHTML = new_s
                }
            }
        }
    }
    printCurrent_task()
    {
        let dd              = localStorage.getItem('Day')
        let stringified     = JSON.parse(localStorage.getItem("Tasks"));
        let CurrentT        = (stringified.dailyTasks.find(o => o.Day === dd) );
        let str             = "To Learn more about this task, click me ! "
        let linka           = str.link(CurrentT.URL)
        printCurr.innerText = localStorage.getItem('Current_Task')
        desc.innerText      = CurrentT.Descripton
        link.innerHTML      = linka


    }
    makeAdict()
    {
        const who             = [];
        localStorage.setItem('Task_doer',JSON.stringify(who))

    }
    checkbox_button() {

        let string = JSON.parse(localStorage.getItem("Task_doer"));
        let new_y = []


        for (let x = 0 ; x < string.length ; ++x)
        {
            if (string[x].name === localStorage.getItem('name'))
            {
                new_y.push(string[x].TaskDone)


            }
        }

        let last =  new_y[new_y.length - 1];

        if ( current_task ===  (last))
        {
            document.getElementById("task_done").hidden = true

        }
        else
        {
            document.getElementById("task_done").hidden = false

        }
    }

    // ScoreIncrementer() {
    //
    //     let string1 = JSON.parse(localStorage.getItem("Task_doer"));
    //     let new_z = []
    //
    //
    //     for (let x = 0 ; x < string1.length ; ++x)
    //     {
    //         if (string1[x].name === localStorage.getItem('name'))
    //         {
    //             new_z.push(string1[x].TaskDone)
    //
    //
    //         }
    //     }
    //
    //     return new_z.length
    //
    // }

    refreshAt(hours, minutes, seconds) {
        let now = new Date();
        let then = new Date();

        if(now.getHours() > hours ||
            (now.getHours() == hours && now.getMinutes() > minutes) ||
            now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
            then.setDate(now.getDate() + 1);
        }
        then.setHours(hours);
        then.setMinutes(minutes);
        then.setSeconds(seconds);

        let timeout = (then.getTime() - now.getTime());
        setTimeout(function() {
            window.location.reload(true);}, timeout);

    }
}

const tasks = new TaskBar()

document.addEventListener("DOMContentLoaded", function(){
    tasks.setName()
    totalTasks()


    tasks.getCurrentTask()
    if (localStorage.getItem("Task_doer") === null)
    {
        tasks.makeAdict()
    }
    if (tasks.isEmpty(JSON.parse(localStorage.getItem("Task_doer"))) === true)
    {
        tasks.makeAdict()
    }
    tasks.printTable()
    tasks.printCurrent_task()
    tasks.checkbox_button()

    tasks.refreshAt(0, 0, 0)

});

checkbox.addEventListener('click',function(){
    tasks.setCurrentTask()
    document.getElementById("task_done").checked = true;
    document.getElementById("task_done").disabled = true
    tasks.printTable()
    tasks.setName()
    let http, username, parameters;
    username = localStorage.getItem("name");
    console.log(username);
    http = new XMLHttpRequest();
    parameters = "username=" + username;
    http.open("GET", "incrementScore.php?" + parameters, true);
    http.setRequestHeader("Content-type", "application/x-www-for,-urlencoded");
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            console.log("Successfully incremented score");
        }
    }
    http.send();

});

//In loading the site, this way it will get the whole task saved in local data, this way it will make the site offline-able for 31 days
function totalTasks() {
    let url = "https://devweb2020.cis.strath.ac.uk/~vib19218/GroupAssesment/tasks.xml";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            //console.log(data);  //string
            let parser = new DOMParser();
            let xml = parser.parseFromString(data, "application/xml");
            let childNodes = xml.getElementsByTagName("Cube")[1].childNodes;
            let childNodeList = [];
            let childNode;
            for (childNode of childNodes) {
                childNodeList.push(childNode);
            }
            childNodes = childNodeList.filter(element => element.nodeName === "Cube");
            let dailyTasks = childNodes.map(element => {
                let currency = {};
                currency.Day = element.getAttribute("Day");
                currency.Task = element.getAttribute("challenge");
                currency.Descripton = element.getAttribute('Descripton')
                currency.URL = element.getAttribute('utube')

                return currency;
            });
            let hi = {dailyTasks}
            localStorage.setItem("Tasks", JSON.stringify(hi));
            return dailyTasks;
        });

}
// Date where it is needed
let newDay = new Date()
const dd = String(newDay.getDate()).padStart(2, '0');
const mm = String(newDay.getMonth() + 1).padStart(2, '0');

//Window reloader In case there is any errors
window.onerror = function myErrorHandler(errorMsg, url, lineNumber) {
    window.location.reload(true);
    return false;
}

