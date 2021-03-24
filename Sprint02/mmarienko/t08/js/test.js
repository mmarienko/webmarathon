mocha.setup('bdd');
let assert = chai.assert;

describe("checkBrackets", function () {
  it("1)()(())2(() is 2", function () {
    assert.equal(checkBrackets("1)()(())2(()"), 2);
  });
  it("(1 + 1 * 4 is 1", function () {
    assert.equal(checkBrackets("(1 + 1 * 4"), 1);
  });
  it("(1)()(())1(() is 1", function () {
    assert.equal(checkBrackets("(1)()(())1(()"), 1);
  });
  it("(((()))) is 0", function () {
    assert.equal(checkBrackets("(((())))"), 0);
  });
  it("knnnk)na is 1", function () {
    assert.equal(checkBrackets("knnnk)na"), 1);
  });
  it("() is 0", function () {
    assert.equal(checkBrackets("()"), 0);
  });
  it("()()()() is 0", function () {
    assert.equal(checkBrackets("()()()()"), 0);
  });
  it("))))) is 5", function () {
    assert.equal(checkBrackets(")))))"), 5);
  });
  it("((((((( is 7", function () {
    assert.equal(checkBrackets("((((((("), 7);
  });
  it("((0(0(0(0( is 6", function () {
    assert.equal(checkBrackets("((0(0(0(0("), 6);
  });
  
  it("Object is -1", function () {
    assert.equal(checkBrackets({}), -1);
  });
  it("NaN is -1", function () {
    assert.equal(checkBrackets(NaN), -1);
  });
  it("undefined is -1", function () {
    assert.equal(checkBrackets(undefined), -1);
  });
  it("bool is -1", function () {
    assert.equal(checkBrackets(true), -1);
  });
  it("BigInt is -1", function () {
    assert.equal(checkBrackets(15n), -1);
  });
});

mocha.run();