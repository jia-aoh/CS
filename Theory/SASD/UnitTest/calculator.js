function add(numbers) {
    var result = 0;
    var dataList = numbers.split(',');
    if (numbers.trim() == "") {
        result = 0;
        return result;
    }

    const numberList = dataList.map( x => Number(x) );
    for (let num of numberList) {
        result += num;
    }

    return result;
}

exports.add = add;
