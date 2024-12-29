let cat = '貓咪';
function dog() {
  console.log('狗狗');
}

//export後面的{}是obj嗎，不是因為:報錯
export {
  cat as bigcat,
  dog
}