(()=>{
  function sendEvent(name, meta){
    try{
      const body = JSON.stringify({event: name, meta});
      navigator.sendBeacon('/api/v1/analytics/event', body) || fetch('/api/v1/analytics/event', {
        method: 'POST', headers: {'Content-Type':'application/json'}, body
      });
    }catch(e){
      console && console.warn && console.warn('analytics send failed', e);
    }
  }

  function handleClick(e){
    const el = e.target.closest('[data-analytics-event]');
    if(!el) return;
    const name = el.getAttribute('data-analytics-event');
    const meta = {};
    Array.from(el.attributes).forEach(a=>{
      if(a.name.startsWith('data-analytics-') && a.name !== 'data-analytics-event'){
        meta[a.name.replace('data-analytics-','')] = a.value;
      }
    });
    sendEvent(name, meta);
  }

  document.addEventListener('click', handleClick, {capture: true});
})();

