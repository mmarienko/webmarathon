class LinkedList {
  constructor() {
    this.head = null;
  }

  add(value) {
    let node = new Node(value);
    let cur;
    if (this.head == null) {
      this.head = node;
    } else {
      cur = this.head;

      while (cur.next) {
        cur = cur.next;
      }

      cur.next = node;
    }
  };

  remove(value) {
    let cur = this.head;
    let prev = null;

    while (cur != null) {
      if (cur.data == value) {
        if (prev == null) {
          this.head = cur.next;
        } else {
          prev.next = cur.next;
        }
      }
      prev = cur;
      cur = cur.next;
    }
  }

  contains(value) {
    let cur = this.head;
    while (cur != null) {
      if (cur.data == value) {
        return true;
      }
      cur = cur.next;
    }
    return false;
  }

  count() {
    let cur = this.head;
    let count = 1;
    while (cur.next) {
      cur = cur.next;
      count++;
    }
    return count;
  }

  clear() {
    let cur = this.head;
    while (cur) {
      this.remove(cur.data);
      cur = cur.next;
    }
  }

  log() {
    let res = [];
    let temp = this.head;
    while (temp) {
      res.push(temp.data);
      temp = temp.next;
    }
    console.log(res.join(","));
  }

  [Symbol.iterator] = function* () {
    let cur = this.head;
    while (cur) {
      yield cur.data;
      cur = cur.next;
    }
  };
}

class Node {
  constructor(data, next = null) {
    this.data = data;
    this.next = next;
  }
}

export function createLinkedList(arr) {
  let ll = new LinkedList();
  let i = 0;
  while (arr[i] != null) {
    ll.add(arr[i]);
    i++;
  }
  return ll;
}
