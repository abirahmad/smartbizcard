export function checkObjectInArray(obj, array, uniqueParam) {

    console.log(`obj`, obj);
    console.log(`array`, array);
    console.log(`uniqueParam`, uniqueParam);
    for (let i = 0; i < array.length; i++) {
      if (array[i][uniqueParam] === obj[uniqueParam]) {
        return true;
      }
    }
    return false;
  }
