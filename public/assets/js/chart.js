const dashboardChart = document.getElementById("dashboard-chart");

async function getChartData() {
    const response = await fetch("/api/transactions");
    const data = await response.json();
    return data;
}

async function createChart() {
    const data = await getChartData();

    const results = data["results"];
    const expensesObj = data["expenses"];
    const incomesObj = data["incomes"];

    const incomesArr = Object.keys(incomesObj).map(key => {
        return {
            key: key,
            ...incomesObj[key]
        };
    });
    const expensesArr = Object.keys(expensesObj).map(key => {
        return {
            key: key,
            ...expensesObj[key]
        };
    });

    const getLabels = (() => {
        let labels = [];
        results.reverse().forEach((element) => {
            if (labels.includes(element.date)) {
                return;
            }
            labels.push(element.date);
        })
        return labels;
    });
    
    const buildData = ((labels, arr) => {
    
        const labelsAndDataArr = labels.map((element) => {
            return {
                date: element,
                amount: 0,
            }
        })
    
        arr.forEach((element) => {
            if (labels.includes(element.date)) {
                const index = labels.indexOf(element.date);
                labelsAndDataArr[index].amount = Number(labelsAndDataArr[index].amount) + Number(element.amount);
            }
        })
        const cleanDataArr = labelsAndDataArr.map((element) => element.amount);
        return cleanDataArr
    })
    
    const labels = getLabels();
    const expenseData = buildData(labels, expensesArr);
    const incomesData = buildData(labels, incomesArr);
    
    
    
    const chart = new Chart(dashboardChart, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: "Expenses",
                data: expenseData,
                borderColor: "#d93879",
                //tension: 0.25,
            }, {
                label: "Incomes",
                data: incomesData,
                borderColor: "#28BE8C"
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: "#18191a"
                    }
                },
                x: {
                    grid: {
                        color: "#18191a"
                    }
                },
            },
        },
    })
    return chart;
}


createChart();






