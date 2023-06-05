const Ziggy = {"url":"http:\/\/localhost:8000","port":8000,"defaults":{},"routes":{"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"]},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"]},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"]},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"]},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"]},"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"listing.index":{"uri":"listing","methods":["GET","HEAD"]},"listing.show":{"uri":"listing\/{listing}","methods":["GET","HEAD"],"bindings":{"listing":"id"}},"login":{"uri":"login","methods":["GET","HEAD"]},"login.store":{"uri":"login","methods":["POST"]},"logout":{"uri":"logout","methods":["DELETE"]},"user.index":{"uri":"user","methods":["GET","HEAD"]},"user.create":{"uri":"user\/create","methods":["GET","HEAD"]},"user.store":{"uri":"user","methods":["POST"]},"user.show":{"uri":"user\/{user}","methods":["GET","HEAD"]},"user.edit":{"uri":"user\/{user}\/edit","methods":["GET","HEAD"]},"user.update":{"uri":"user\/{user}","methods":["PUT","PATCH"]},"user.destroy":{"uri":"user\/{user}","methods":["DELETE"]},"realtor.listing.restore":{"uri":"realtor\/listing\/{listing}\/restore","methods":["PUT"],"bindings":{"listing":"id"}},"realtor.listing.index":{"uri":"realtor\/listing","methods":["GET","HEAD"]},"realtor.listing.create":{"uri":"realtor\/listing\/create","methods":["GET","HEAD"]},"realtor.listing.store":{"uri":"realtor\/listing","methods":["POST"]},"realtor.listing.show":{"uri":"realtor\/listing\/{listing}","methods":["GET","HEAD"]},"realtor.listing.edit":{"uri":"realtor\/listing\/{listing}\/edit","methods":["GET","HEAD"],"bindings":{"listing":"id"}},"realtor.listing.update":{"uri":"realtor\/listing\/{listing}","methods":["PUT","PATCH"],"bindings":{"listing":"id"}},"realtor.listing.destroy":{"uri":"realtor\/listing\/{listing}","methods":["DELETE"],"bindings":{"listing":"id"}}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
