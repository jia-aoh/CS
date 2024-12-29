const calculator = require('./calculator')

test('normal list', () => {
  expect(calculator.add('1,2,3')).toBe(6);
});

test('wrong format', () => {
  expect(calculator.add('1,2,,4,')).toBe(7);
});

test('empty list should be 0', () => {
  expect(calculator.add('')).toBe(0);
});