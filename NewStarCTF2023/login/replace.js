replace(e, t) ;{
    let n = [],
    r = !1;
    const o = 'string' == typeof e ? e.replaceAll(/[\^\$\.\*\+\?\(\)\[\]\{\}\|\\\/]/g, '\\$&') : e;
    return this._arr.forEach(
      (
        l => {
          if ('string' != typeof l) return n.push(s);
          let _ = l.match(o);
          if (null === _) return n.push(l);
          r = !0,
          n.push(l.substring(0, _.index)),
          n.push({
            search: e,
            src: _[0],
            dst: t
          }),
          n.push(l.substring(_.index + _[0].length))
        }
      )
    ),
    this._arr = n,
    r
  }