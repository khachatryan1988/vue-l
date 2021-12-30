export function savePerson(arg) {
  let records = []
  records.push(arg)
  localStorage.setItem('record', JSON.stringify(records));
}
