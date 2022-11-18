(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/bootstrap"],{

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var laravel_echo__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! laravel-echo */ "./node_modules/laravel-echo/dist/echo.js");
// import Echo from 'laravel-echo';
// import Larasocket from 'larasocket-js';
// window.Echo = new Echo({
//     broadcaster: Larasocket,
//     token: process.env.MIX_LARASOCKET_TOKEN,
// });

window.Pusher = __webpack_require__(/*! pusher-js */ "./node_modules/pusher-js/dist/web/pusher.js");
window.Echo = new laravel_echo__WEBPACK_IMPORTED_MODULE_0__.default({
  broadcaster: 'pusher',
  key: "6065ec6243c90c5489c8",
  cluster: "mt1",
  encrypted: true //forceTLS: true

});
Window.Echo.channel('chat').listen('.message', function (e) {
  console.log('---- Message Aya ----');
  console.log(e);
  console.log('---- Message Aya ----');
}); // Echo.private('chat')
//     .listen('MessageSentEvent', (e) => {
//         console.log('---- Message Aya ----');
//         console.log(e);
//         console.log('---- Message Aya ----');
//     });

window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
window.Swal = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.Popper = __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js").default;
  window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

  __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

/***/ }),

/***/ "./node_modules/laravel-echo/dist/echo.js":
/*!************************************************!*\
  !*** ./node_modules/laravel-echo/dist/echo.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _possibleConstructorReturn(self, call) {
  if (call && (typeof call === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _createSuper(Derived) {
  var hasNativeReflectConstruct = _isNativeReflectConstruct();

  return function () {
    var Super = _getPrototypeOf(Derived),
        result;

    if (hasNativeReflectConstruct) {
      var NewTarget = _getPrototypeOf(this).constructor;

      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

var Connector = /*#__PURE__*/function () {
  /**
   * Create a new class instance.
   */
  function Connector(options) {
    _classCallCheck(this, Connector);

    /**
     * Default connector options.
     */
    this._defaultOptions = {
      auth: {
        headers: {}
      },
      authEndpoint: '/broadcasting/auth',
      broadcaster: 'pusher',
      csrfToken: null,
      host: null,
      key: null,
      namespace: 'App.Events'
    };
    this.setOptions(options);
    this.connect();
  }
  /**
   * Merge the custom options with the defaults.
   */


  _createClass(Connector, [{
    key: "setOptions",
    value: function setOptions(options) {
      this.options = _extends(this._defaultOptions, options);

      if (this.csrfToken()) {
        this.options.auth.headers['X-CSRF-TOKEN'] = this.csrfToken();
      }

      return options;
    }
    /**
     * Extract the CSRF token from the page.
     */

  }, {
    key: "csrfToken",
    value: function csrfToken() {
      var selector;

      if (typeof window !== 'undefined' && window['Laravel'] && window['Laravel'].csrfToken) {
        return window['Laravel'].csrfToken;
      } else if (this.options.csrfToken) {
        return this.options.csrfToken;
      } else if (typeof document !== 'undefined' && typeof document.querySelector === 'function' && (selector = document.querySelector('meta[name="csrf-token"]'))) {
        return selector.getAttribute('content');
      }

      return null;
    }
  }]);

  return Connector;
}();

/**
 * This class represents a basic channel.
 */
var Channel = /*#__PURE__*/function () {
  function Channel() {
    _classCallCheck(this, Channel);
  }

  _createClass(Channel, [{
    key: "listenForWhisper",

    /**
     * Listen for a whisper event on the channel instance.
     */
    value: function listenForWhisper(event, callback) {
      return this.listen('.client-' + event, callback);
    }
    /**
     * Listen for an event on the channel instance.
     */

  }, {
    key: "notification",
    value: function notification(callback) {
      return this.listen('.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', callback);
    }
    /**
     * Stop listening for a whisper event on the channel instance.
     */

  }, {
    key: "stopListeningForWhisper",
    value: function stopListeningForWhisper(event, callback) {
      return this.stopListening('.client-' + event, callback);
    }
  }]);

  return Channel;
}();

/**
 * Event name formatter
 */
var EventFormatter = /*#__PURE__*/function () {
  /**
   * Create a new class instance.
   */
  function EventFormatter(namespace) {
    _classCallCheck(this, EventFormatter);

    this.setNamespace(namespace);
  }
  /**
   * Format the given event name.
   */


  _createClass(EventFormatter, [{
    key: "format",
    value: function format(event) {
      if (event.charAt(0) === '.' || event.charAt(0) === '\\') {
        return event.substr(1);
      } else if (this.namespace) {
        event = this.namespace + '.' + event;
      }

      return event.replace(/\./g, '\\');
    }
    /**
     * Set the event namespace.
     */

  }, {
    key: "setNamespace",
    value: function setNamespace(value) {
      this.namespace = value;
    }
  }]);

  return EventFormatter;
}();

/**
 * This class represents a Pusher channel.
 */

var PusherChannel = /*#__PURE__*/function (_Channel) {
  _inherits(PusherChannel, _Channel);

  var _super = _createSuper(PusherChannel);

  /**
   * Create a new class instance.
   */
  function PusherChannel(pusher, name, options) {
    var _this;

    _classCallCheck(this, PusherChannel);

    _this = _super.call(this);
    _this.name = name;
    _this.pusher = pusher;
    _this.options = options;
    _this.eventFormatter = new EventFormatter(_this.options.namespace);

    _this.subscribe();

    return _this;
  }
  /**
   * Subscribe to a Pusher channel.
   */


  _createClass(PusherChannel, [{
    key: "subscribe",
    value: function subscribe() {
      this.subscription = this.pusher.subscribe(this.name);
    }
    /**
     * Unsubscribe from a Pusher channel.
     */

  }, {
    key: "unsubscribe",
    value: function unsubscribe() {
      this.pusher.unsubscribe(this.name);
    }
    /**
     * Listen for an event on the channel instance.
     */

  }, {
    key: "listen",
    value: function listen(event, callback) {
      this.on(this.eventFormatter.format(event), callback);
      return this;
    }
    /**
     * Listen for all events on the channel instance.
     */

  }, {
    key: "listenToAll",
    value: function listenToAll(callback) {
      var _this2 = this;

      this.subscription.bind_global(function (event, data) {
        if (event.startsWith('pusher:')) {
          return;
        }

        var namespace = _this2.options.namespace.replace(/\./g, '\\');

        var formattedEvent = event.startsWith(namespace) ? event.substring(namespace.length + 1) : '.' + event;
        callback(formattedEvent, data);
      });
      return this;
    }
    /**
     * Stop listening for an event on the channel instance.
     */

  }, {
    key: "stopListening",
    value: function stopListening(event, callback) {
      if (callback) {
        this.subscription.unbind(this.eventFormatter.format(event), callback);
      } else {
        this.subscription.unbind(this.eventFormatter.format(event));
      }

      return this;
    }
    /**
     * Stop listening for all events on the channel instance.
     */

  }, {
    key: "stopListeningToAll",
    value: function stopListeningToAll(callback) {
      if (callback) {
        this.subscription.unbind_global(callback);
      } else {
        this.subscription.unbind_global();
      }

      return this;
    }
    /**
     * Register a callback to be called anytime a subscription succeeds.
     */

  }, {
    key: "subscribed",
    value: function subscribed(callback) {
      this.on('pusher:subscription_succeeded', function () {
        callback();
      });
      return this;
    }
    /**
     * Register a callback to be called anytime a subscription error occurs.
     */

  }, {
    key: "error",
    value: function error(callback) {
      this.on('pusher:subscription_error', function (status) {
        callback(status);
      });
      return this;
    }
    /**
     * Bind a channel to an event.
     */

  }, {
    key: "on",
    value: function on(event, callback) {
      this.subscription.bind(event, callback);
      return this;
    }
  }]);

  return PusherChannel;
}(Channel);

/**
 * This class represents a Pusher private channel.
 */

var PusherPrivateChannel = /*#__PURE__*/function (_PusherChannel) {
  _inherits(PusherPrivateChannel, _PusherChannel);

  var _super = _createSuper(PusherPrivateChannel);

  function PusherPrivateChannel() {
    _classCallCheck(this, PusherPrivateChannel);

    return _super.apply(this, arguments);
  }

  _createClass(PusherPrivateChannel, [{
    key: "whisper",

    /**
     * Trigger client event on the channel.
     */
    value: function whisper(eventName, data) {
      this.pusher.channels.channels[this.name].trigger("client-".concat(eventName), data);
      return this;
    }
  }]);

  return PusherPrivateChannel;
}(PusherChannel);

/**
 * This class represents a Pusher private channel.
 */

var PusherEncryptedPrivateChannel = /*#__PURE__*/function (_PusherChannel) {
  _inherits(PusherEncryptedPrivateChannel, _PusherChannel);

  var _super = _createSuper(PusherEncryptedPrivateChannel);

  function PusherEncryptedPrivateChannel() {
    _classCallCheck(this, PusherEncryptedPrivateChannel);

    return _super.apply(this, arguments);
  }

  _createClass(PusherEncryptedPrivateChannel, [{
    key: "whisper",

    /**
     * Trigger client event on the channel.
     */
    value: function whisper(eventName, data) {
      this.pusher.channels.channels[this.name].trigger("client-".concat(eventName), data);
      return this;
    }
  }]);

  return PusherEncryptedPrivateChannel;
}(PusherChannel);

/**
 * This class represents a Pusher presence channel.
 */

var PusherPresenceChannel = /*#__PURE__*/function (_PusherChannel) {
  _inherits(PusherPresenceChannel, _PusherChannel);

  var _super = _createSuper(PusherPresenceChannel);

  function PusherPresenceChannel() {
    _classCallCheck(this, PusherPresenceChannel);

    return _super.apply(this, arguments);
  }

  _createClass(PusherPresenceChannel, [{
    key: "here",

    /**
     * Register a callback to be called anytime the member list changes.
     */
    value: function here(callback) {
      this.on('pusher:subscription_succeeded', function (data) {
        callback(Object.keys(data.members).map(function (k) {
          return data.members[k];
        }));
      });
      return this;
    }
    /**
     * Listen for someone joining the channel.
     */

  }, {
    key: "joining",
    value: function joining(callback) {
      this.on('pusher:member_added', function (member) {
        callback(member.info);
      });
      return this;
    }
    /**
     * Listen for someone leaving the channel.
     */

  }, {
    key: "leaving",
    value: function leaving(callback) {
      this.on('pusher:member_removed', function (member) {
        callback(member.info);
      });
      return this;
    }
    /**
     * Trigger client event on the channel.
     */

  }, {
    key: "whisper",
    value: function whisper(eventName, data) {
      this.pusher.channels.channels[this.name].trigger("client-".concat(eventName), data);
      return this;
    }
  }]);

  return PusherPresenceChannel;
}(PusherChannel);

/**
 * This class represents a Socket.io channel.
 */

var SocketIoChannel = /*#__PURE__*/function (_Channel) {
  _inherits(SocketIoChannel, _Channel);

  var _super = _createSuper(SocketIoChannel);

  /**
   * Create a new class instance.
   */
  function SocketIoChannel(socket, name, options) {
    var _this;

    _classCallCheck(this, SocketIoChannel);

    _this = _super.call(this);
    /**
     * The event callbacks applied to the socket.
     */

    _this.events = {};
    /**
     * User supplied callbacks for events on this channel.
     */

    _this.listeners = {};
    _this.name = name;
    _this.socket = socket;
    _this.options = options;
    _this.eventFormatter = new EventFormatter(_this.options.namespace);

    _this.subscribe();

    return _this;
  }
  /**
   * Subscribe to a Socket.io channel.
   */


  _createClass(SocketIoChannel, [{
    key: "subscribe",
    value: function subscribe() {
      this.socket.emit('subscribe', {
        channel: this.name,
        auth: this.options.auth || {}
      });
    }
    /**
     * Unsubscribe from channel and ubind event callbacks.
     */

  }, {
    key: "unsubscribe",
    value: function unsubscribe() {
      this.unbind();
      this.socket.emit('unsubscribe', {
        channel: this.name,
        auth: this.options.auth || {}
      });
    }
    /**
     * Listen for an event on the channel instance.
     */

  }, {
    key: "listen",
    value: function listen(event, callback) {
      this.on(this.eventFormatter.format(event), callback);
      return this;
    }
    /**
     * Stop listening for an event on the channel instance.
     */

  }, {
    key: "stopListening",
    value: function stopListening(event, callback) {
      this.unbindEvent(this.eventFormatter.format(event), callback);
      return this;
    }
    /**
     * Register a callback to be called anytime a subscription succeeds.
     */

  }, {
    key: "subscribed",
    value: function subscribed(callback) {
      this.on('connect', function (socket) {
        callback(socket);
      });
      return this;
    }
    /**
     * Register a callback to be called anytime an error occurs.
     */

  }, {
    key: "error",
    value: function error(callback) {
      return this;
    }
    /**
     * Bind the channel's socket to an event and store the callback.
     */

  }, {
    key: "on",
    value: function on(event, callback) {
      var _this2 = this;

      this.listeners[event] = this.listeners[event] || [];

      if (!this.events[event]) {
        this.events[event] = function (channel, data) {
          if (_this2.name === channel && _this2.listeners[event]) {
            _this2.listeners[event].forEach(function (cb) {
              return cb(data);
            });
          }
        };

        this.socket.on(event, this.events[event]);
      }

      this.listeners[event].push(callback);
      return this;
    }
    /**
     * Unbind the channel's socket from all stored event callbacks.
     */

  }, {
    key: "unbind",
    value: function unbind() {
      var _this3 = this;

      Object.keys(this.events).forEach(function (event) {
        _this3.unbindEvent(event);
      });
    }
    /**
     * Unbind the listeners for the given event.
     */

  }, {
    key: "unbindEvent",
    value: function unbindEvent(event, callback) {
      this.listeners[event] = this.listeners[event] || [];

      if (callback) {
        this.listeners[event] = this.listeners[event].filter(function (cb) {
          return cb !== callback;
        });
      }

      if (!callback || this.listeners[event].length === 0) {
        if (this.events[event]) {
          this.socket.removeListener(event, this.events[event]);
          delete this.events[event];
        }

        delete this.listeners[event];
      }
    }
  }]);

  return SocketIoChannel;
}(Channel);

/**
 * This class represents a Socket.io private channel.
 */

var SocketIoPrivateChannel = /*#__PURE__*/function (_SocketIoChannel) {
  _inherits(SocketIoPrivateChannel, _SocketIoChannel);

  var _super = _createSuper(SocketIoPrivateChannel);

  function SocketIoPrivateChannel() {
    _classCallCheck(this, SocketIoPrivateChannel);

    return _super.apply(this, arguments);
  }

  _createClass(SocketIoPrivateChannel, [{
    key: "whisper",

    /**
     * Trigger client event on the channel.
     */
    value: function whisper(eventName, data) {
      this.socket.emit('client event', {
        channel: this.name,
        event: "client-".concat(eventName),
        data: data
      });
      return this;
    }
  }]);

  return SocketIoPrivateChannel;
}(SocketIoChannel);

/**
 * This class represents a Socket.io presence channel.
 */

var SocketIoPresenceChannel = /*#__PURE__*/function (_SocketIoPrivateChann) {
  _inherits(SocketIoPresenceChannel, _SocketIoPrivateChann);

  var _super = _createSuper(SocketIoPresenceChannel);

  function SocketIoPresenceChannel() {
    _classCallCheck(this, SocketIoPresenceChannel);

    return _super.apply(this, arguments);
  }

  _createClass(SocketIoPresenceChannel, [{
    key: "here",

    /**
     * Register a callback to be called anytime the member list changes.
     */
    value: function here(callback) {
      this.on('presence:subscribed', function (members) {
        callback(members.map(function (m) {
          return m.user_info;
        }));
      });
      return this;
    }
    /**
     * Listen for someone joining the channel.
     */

  }, {
    key: "joining",
    value: function joining(callback) {
      this.on('presence:joining', function (member) {
        return callback(member.user_info);
      });
      return this;
    }
    /**
     * Listen for someone leaving the channel.
     */

  }, {
    key: "leaving",
    value: function leaving(callback) {
      this.on('presence:leaving', function (member) {
        return callback(member.user_info);
      });
      return this;
    }
  }]);

  return SocketIoPresenceChannel;
}(SocketIoPrivateChannel);

/**
 * This class represents a null channel.
 */

var NullChannel = /*#__PURE__*/function (_Channel) {
  _inherits(NullChannel, _Channel);

  var _super = _createSuper(NullChannel);

  function NullChannel() {
    _classCallCheck(this, NullChannel);

    return _super.apply(this, arguments);
  }

  _createClass(NullChannel, [{
    key: "subscribe",

    /**
     * Subscribe to a channel.
     */
    value: function subscribe() {} //

    /**
     * Unsubscribe from a channel.
     */

  }, {
    key: "unsubscribe",
    value: function unsubscribe() {} //

    /**
     * Listen for an event on the channel instance.
     */

  }, {
    key: "listen",
    value: function listen(event, callback) {
      return this;
    }
    /**
     * Stop listening for an event on the channel instance.
     */

  }, {
    key: "stopListening",
    value: function stopListening(event, callback) {
      return this;
    }
    /**
     * Register a callback to be called anytime a subscription succeeds.
     */

  }, {
    key: "subscribed",
    value: function subscribed(callback) {
      return this;
    }
    /**
     * Register a callback to be called anytime an error occurs.
     */

  }, {
    key: "error",
    value: function error(callback) {
      return this;
    }
    /**
     * Bind a channel to an event.
     */

  }, {
    key: "on",
    value: function on(event, callback) {
      return this;
    }
  }]);

  return NullChannel;
}(Channel);

/**
 * This class represents a null private channel.
 */

var NullPrivateChannel = /*#__PURE__*/function (_NullChannel) {
  _inherits(NullPrivateChannel, _NullChannel);

  var _super = _createSuper(NullPrivateChannel);

  function NullPrivateChannel() {
    _classCallCheck(this, NullPrivateChannel);

    return _super.apply(this, arguments);
  }

  _createClass(NullPrivateChannel, [{
    key: "whisper",

    /**
     * Trigger client event on the channel.
     */
    value: function whisper(eventName, data) {
      return this;
    }
  }]);

  return NullPrivateChannel;
}(NullChannel);

/**
 * This class represents a null presence channel.
 */

var NullPresenceChannel = /*#__PURE__*/function (_NullChannel) {
  _inherits(NullPresenceChannel, _NullChannel);

  var _super = _createSuper(NullPresenceChannel);

  function NullPresenceChannel() {
    _classCallCheck(this, NullPresenceChannel);

    return _super.apply(this, arguments);
  }

  _createClass(NullPresenceChannel, [{
    key: "here",

    /**
     * Register a callback to be called anytime the member list changes.
     */
    value: function here(callback) {
      return this;
    }
    /**
     * Listen for someone joining the channel.
     */

  }, {
    key: "joining",
    value: function joining(callback) {
      return this;
    }
    /**
     * Listen for someone leaving the channel.
     */

  }, {
    key: "leaving",
    value: function leaving(callback) {
      return this;
    }
    /**
     * Trigger client event on the channel.
     */

  }, {
    key: "whisper",
    value: function whisper(eventName, data) {
      return this;
    }
  }]);

  return NullPresenceChannel;
}(NullChannel);

/**
 * This class creates a connector to Pusher.
 */

var PusherConnector = /*#__PURE__*/function (_Connector) {
  _inherits(PusherConnector, _Connector);

  var _super = _createSuper(PusherConnector);

  function PusherConnector() {
    var _this;

    _classCallCheck(this, PusherConnector);

    _this = _super.apply(this, arguments);
    /**
     * All of the subscribed channel names.
     */

    _this.channels = {};
    return _this;
  }
  /**
   * Create a fresh Pusher connection.
   */


  _createClass(PusherConnector, [{
    key: "connect",
    value: function connect() {
      if (typeof this.options.client !== 'undefined') {
        this.pusher = this.options.client;
      } else {
        this.pusher = new Pusher(this.options.key, this.options);
      }
    }
    /**
     * Listen for an event on a channel instance.
     */

  }, {
    key: "listen",
    value: function listen(name, event, callback) {
      return this.channel(name).listen(event, callback);
    }
    /**
     * Get a channel instance by name.
     */

  }, {
    key: "channel",
    value: function channel(name) {
      if (!this.channels[name]) {
        this.channels[name] = new PusherChannel(this.pusher, name, this.options);
      }

      return this.channels[name];
    }
    /**
     * Get a private channel instance by name.
     */

  }, {
    key: "privateChannel",
    value: function privateChannel(name) {
      if (!this.channels['private-' + name]) {
        this.channels['private-' + name] = new PusherPrivateChannel(this.pusher, 'private-' + name, this.options);
      }

      return this.channels['private-' + name];
    }
    /**
     * Get a private encrypted channel instance by name.
     */

  }, {
    key: "encryptedPrivateChannel",
    value: function encryptedPrivateChannel(name) {
      if (!this.channels['private-encrypted-' + name]) {
        this.channels['private-encrypted-' + name] = new PusherEncryptedPrivateChannel(this.pusher, 'private-encrypted-' + name, this.options);
      }

      return this.channels['private-encrypted-' + name];
    }
    /**
     * Get a presence channel instance by name.
     */

  }, {
    key: "presenceChannel",
    value: function presenceChannel(name) {
      if (!this.channels['presence-' + name]) {
        this.channels['presence-' + name] = new PusherPresenceChannel(this.pusher, 'presence-' + name, this.options);
      }

      return this.channels['presence-' + name];
    }
    /**
     * Leave the given channel, as well as its private and presence variants.
     */

  }, {
    key: "leave",
    value: function leave(name) {
      var _this2 = this;

      var channels = [name, 'private-' + name, 'presence-' + name];
      channels.forEach(function (name, index) {
        _this2.leaveChannel(name);
      });
    }
    /**
     * Leave the given channel.
     */

  }, {
    key: "leaveChannel",
    value: function leaveChannel(name) {
      if (this.channels[name]) {
        this.channels[name].unsubscribe();
        delete this.channels[name];
      }
    }
    /**
     * Get the socket ID for the connection.
     */

  }, {
    key: "socketId",
    value: function socketId() {
      return this.pusher.connection.socket_id;
    }
    /**
     * Disconnect Pusher connection.
     */

  }, {
    key: "disconnect",
    value: function disconnect() {
      this.pusher.disconnect();
    }
  }]);

  return PusherConnector;
}(Connector);

/**
 * This class creates a connnector to a Socket.io server.
 */

var SocketIoConnector = /*#__PURE__*/function (_Connector) {
  _inherits(SocketIoConnector, _Connector);

  var _super = _createSuper(SocketIoConnector);

  function SocketIoConnector() {
    var _this;

    _classCallCheck(this, SocketIoConnector);

    _this = _super.apply(this, arguments);
    /**
     * All of the subscribed channel names.
     */

    _this.channels = {};
    return _this;
  }
  /**
   * Create a fresh Socket.io connection.
   */


  _createClass(SocketIoConnector, [{
    key: "connect",
    value: function connect() {
      var _this2 = this;

      var io = this.getSocketIO();
      this.socket = io(this.options.host, this.options);
      this.socket.on('reconnect', function () {
        Object.values(_this2.channels).forEach(function (channel) {
          channel.subscribe();
        });
      });
      return this.socket;
    }
    /**
     * Get socket.io module from global scope or options.
     */

  }, {
    key: "getSocketIO",
    value: function getSocketIO() {
      if (typeof this.options.client !== 'undefined') {
        return this.options.client;
      }

      if (typeof io !== 'undefined') {
        return io;
      }

      throw new Error('Socket.io client not found. Should be globally available or passed via options.client');
    }
    /**
     * Listen for an event on a channel instance.
     */

  }, {
    key: "listen",
    value: function listen(name, event, callback) {
      return this.channel(name).listen(event, callback);
    }
    /**
     * Get a channel instance by name.
     */

  }, {
    key: "channel",
    value: function channel(name) {
      if (!this.channels[name]) {
        this.channels[name] = new SocketIoChannel(this.socket, name, this.options);
      }

      return this.channels[name];
    }
    /**
     * Get a private channel instance by name.
     */

  }, {
    key: "privateChannel",
    value: function privateChannel(name) {
      if (!this.channels['private-' + name]) {
        this.channels['private-' + name] = new SocketIoPrivateChannel(this.socket, 'private-' + name, this.options);
      }

      return this.channels['private-' + name];
    }
    /**
     * Get a presence channel instance by name.
     */

  }, {
    key: "presenceChannel",
    value: function presenceChannel(name) {
      if (!this.channels['presence-' + name]) {
        this.channels['presence-' + name] = new SocketIoPresenceChannel(this.socket, 'presence-' + name, this.options);
      }

      return this.channels['presence-' + name];
    }
    /**
     * Leave the given channel, as well as its private and presence variants.
     */

  }, {
    key: "leave",
    value: function leave(name) {
      var _this3 = this;

      var channels = [name, 'private-' + name, 'presence-' + name];
      channels.forEach(function (name) {
        _this3.leaveChannel(name);
      });
    }
    /**
     * Leave the given channel.
     */

  }, {
    key: "leaveChannel",
    value: function leaveChannel(name) {
      if (this.channels[name]) {
        this.channels[name].unsubscribe();
        delete this.channels[name];
      }
    }
    /**
     * Get the socket ID for the connection.
     */

  }, {
    key: "socketId",
    value: function socketId() {
      return this.socket.id;
    }
    /**
     * Disconnect Socketio connection.
     */

  }, {
    key: "disconnect",
    value: function disconnect() {
      this.socket.disconnect();
    }
  }]);

  return SocketIoConnector;
}(Connector);

/**
 * This class creates a null connector.
 */

var NullConnector = /*#__PURE__*/function (_Connector) {
  _inherits(NullConnector, _Connector);

  var _super = _createSuper(NullConnector);

  function NullConnector() {
    var _this;

    _classCallCheck(this, NullConnector);

    _this = _super.apply(this, arguments);
    /**
     * All of the subscribed channel names.
     */

    _this.channels = {};
    return _this;
  }
  /**
   * Create a fresh connection.
   */


  _createClass(NullConnector, [{
    key: "connect",
    value: function connect() {} //

    /**
     * Listen for an event on a channel instance.
     */

  }, {
    key: "listen",
    value: function listen(name, event, callback) {
      return new NullChannel();
    }
    /**
     * Get a channel instance by name.
     */

  }, {
    key: "channel",
    value: function channel(name) {
      return new NullChannel();
    }
    /**
     * Get a private channel instance by name.
     */

  }, {
    key: "privateChannel",
    value: function privateChannel(name) {
      return new NullPrivateChannel();
    }
    /**
     * Get a presence channel instance by name.
     */

  }, {
    key: "presenceChannel",
    value: function presenceChannel(name) {
      return new NullPresenceChannel();
    }
    /**
     * Leave the given channel, as well as its private and presence variants.
     */

  }, {
    key: "leave",
    value: function leave(name) {} //

    /**
     * Leave the given channel.
     */

  }, {
    key: "leaveChannel",
    value: function leaveChannel(name) {} //

    /**
     * Get the socket ID for the connection.
     */

  }, {
    key: "socketId",
    value: function socketId() {
      return 'fake-socket-id';
    }
    /**
     * Disconnect the connection.
     */

  }, {
    key: "disconnect",
    value: function disconnect() {//
    }
  }]);

  return NullConnector;
}(Connector);

/**
 * This class is the primary API for interacting with broadcasting.
 */

var Echo = /*#__PURE__*/function () {
  /**
   * Create a new class instance.
   */
  function Echo(options) {
    _classCallCheck(this, Echo);

    this.options = options;
    this.connect();

    if (!this.options.withoutInterceptors) {
      this.registerInterceptors();
    }
  }
  /**
   * Get a channel instance by name.
   */


  _createClass(Echo, [{
    key: "channel",
    value: function channel(_channel) {
      return this.connector.channel(_channel);
    }
    /**
     * Create a new connection.
     */

  }, {
    key: "connect",
    value: function connect() {
      if (this.options.broadcaster == 'pusher') {
        this.connector = new PusherConnector(this.options);
      } else if (this.options.broadcaster == 'socket.io') {
        this.connector = new SocketIoConnector(this.options);
      } else if (this.options.broadcaster == 'null') {
        this.connector = new NullConnector(this.options);
      } else if (typeof this.options.broadcaster == 'function') {
        this.connector = new this.options.broadcaster(this.options);
      }
    }
    /**
     * Disconnect from the Echo server.
     */

  }, {
    key: "disconnect",
    value: function disconnect() {
      this.connector.disconnect();
    }
    /**
     * Get a presence channel instance by name.
     */

  }, {
    key: "join",
    value: function join(channel) {
      return this.connector.presenceChannel(channel);
    }
    /**
     * Leave the given channel, as well as its private and presence variants.
     */

  }, {
    key: "leave",
    value: function leave(channel) {
      this.connector.leave(channel);
    }
    /**
     * Leave the given channel.
     */

  }, {
    key: "leaveChannel",
    value: function leaveChannel(channel) {
      this.connector.leaveChannel(channel);
    }
    /**
     * Listen for an event on a channel instance.
     */

  }, {
    key: "listen",
    value: function listen(channel, event, callback) {
      return this.connector.listen(channel, event, callback);
    }
    /**
     * Get a private channel instance by name.
     */

  }, {
    key: "private",
    value: function _private(channel) {
      return this.connector.privateChannel(channel);
    }
    /**
     * Get a private encrypted channel instance by name.
     */

  }, {
    key: "encryptedPrivate",
    value: function encryptedPrivate(channel) {
      return this.connector.encryptedPrivateChannel(channel);
    }
    /**
     * Get the Socket ID for the connection.
     */

  }, {
    key: "socketId",
    value: function socketId() {
      return this.connector.socketId();
    }
    /**
     * Register 3rd party request interceptiors. These are used to automatically
     * send a connections socket id to a Laravel app with a X-Socket-Id header.
     */

  }, {
    key: "registerInterceptors",
    value: function registerInterceptors() {
      if (typeof Vue === 'function' && Vue.http) {
        this.registerVueRequestInterceptor();
      }

      if (typeof axios === 'function') {
        this.registerAxiosRequestInterceptor();
      }

      if (typeof jQuery === 'function') {
        this.registerjQueryAjaxSetup();
      }
    }
    /**
     * Register a Vue HTTP interceptor to add the X-Socket-ID header.
     */

  }, {
    key: "registerVueRequestInterceptor",
    value: function registerVueRequestInterceptor() {
      var _this = this;

      Vue.http.interceptors.push(function (request, next) {
        if (_this.socketId()) {
          request.headers.set('X-Socket-ID', _this.socketId());
        }

        next();
      });
    }
    /**
     * Register an Axios HTTP interceptor to add the X-Socket-ID header.
     */

  }, {
    key: "registerAxiosRequestInterceptor",
    value: function registerAxiosRequestInterceptor() {
      var _this2 = this;

      axios.interceptors.request.use(function (config) {
        if (_this2.socketId()) {
          config.headers['X-Socket-Id'] = _this2.socketId();
        }

        return config;
      });
    }
    /**
     * Register jQuery AjaxPrefilter to add the X-Socket-ID header.
     */

  }, {
    key: "registerjQueryAjaxSetup",
    value: function registerjQueryAjaxSetup() {
      var _this3 = this;

      if (typeof jQuery.ajax != 'undefined') {
        jQuery.ajaxPrefilter(function (options, originalOptions, xhr) {
          if (_this3.socketId()) {
            xhr.setRequestHeader('X-Socket-Id', _this3.socketId());
          }
        });
      }
    }
  }]);

  return Echo;
}();

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Echo);


/***/ }),

/***/ "./node_modules/process/browser.js":
/*!*****************************************!*\
  !*** ./node_modules/process/browser.js ***!
  \*****************************************/
/***/ ((module) => {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ }),

/***/ "./node_modules/pusher-js/dist/web/pusher.js":
/*!***************************************************!*\
  !*** ./node_modules/pusher-js/dist/web/pusher.js ***!
  \***************************************************/
/***/ ((module) => {

/*!
 * Pusher JavaScript Library v7.0.3
 * https://pusher.com/
 *
 * Copyright 2020, Pusher
 * Released under the MIT licence.
 */

(function webpackUniversalModuleDefinition(root, factory) {
	if(true)
		module.exports = factory();
	else {}
})(window, function() {
return /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __nested_webpack_require_669__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __nested_webpack_require_669__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__nested_webpack_require_669__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__nested_webpack_require_669__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__nested_webpack_require_669__.d = function(exports, name, getter) {
/******/ 		if(!__nested_webpack_require_669__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__nested_webpack_require_669__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__nested_webpack_require_669__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __nested_webpack_require_669__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__nested_webpack_require_669__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __nested_webpack_require_669__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__nested_webpack_require_669__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__nested_webpack_require_669__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__nested_webpack_require_669__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__nested_webpack_require_669__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __nested_webpack_require_669__(__nested_webpack_require_669__.s = 2);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

// Copyright (C) 2016 Dmitry Chestnykh
// MIT License. See LICENSE file for details.
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
Object.defineProperty(exports, "__esModule", { value: true });
/**
 * Package base64 implements Base64 encoding and decoding.
 */
// Invalid character used in decoding to indicate
// that the character to decode is out of range of
// alphabet and cannot be decoded.
var INVALID_BYTE = 256;
/**
 * Implements standard Base64 encoding.
 *
 * Operates in constant time.
 */
var Coder = /** @class */ (function () {
    // TODO(dchest): methods to encode chunk-by-chunk.
    function Coder(_paddingCharacter) {
        if (_paddingCharacter === void 0) { _paddingCharacter = "="; }
        this._paddingCharacter = _paddingCharacter;
    }
    Coder.prototype.encodedLength = function (length) {
        if (!this._paddingCharacter) {
            return (length * 8 + 5) / 6 | 0;
        }
        return (length + 2) / 3 * 4 | 0;
    };
    Coder.prototype.encode = function (data) {
        var out = "";
        var i = 0;
        for (; i < data.length - 2; i += 3) {
            var c = (data[i] << 16) | (data[i + 1] << 8) | (data[i + 2]);
            out += this._encodeByte((c >>> 3 * 6) & 63);
            out += this._encodeByte((c >>> 2 * 6) & 63);
            out += this._encodeByte((c >>> 1 * 6) & 63);
            out += this._encodeByte((c >>> 0 * 6) & 63);
        }
        var left = data.length - i;
        if (left > 0) {
            var c = (data[i] << 16) | (left === 2 ? data[i + 1] << 8 : 0);
            out += this._encodeByte((c >>> 3 * 6) & 63);
            out += this._encodeByte((c >>> 2 * 6) & 63);
            if (left === 2) {
                out += this._encodeByte((c >>> 1 * 6) & 63);
            }
            else {
                out += this._paddingCharacter || "";
            }
            out += this._paddingCharacter || "";
        }
        return out;
    };
    Coder.prototype.maxDecodedLength = function (length) {
        if (!this._paddingCharacter) {
            return (length * 6 + 7) / 8 | 0;
        }
        return length / 4 * 3 | 0;
    };
    Coder.prototype.decodedLength = function (s) {
        return this.maxDecodedLength(s.length - this._getPaddingLength(s));
    };
    Coder.prototype.decode = function (s) {
        if (s.length === 0) {
            return new Uint8Array(0);
        }
        var paddingLength = this._getPaddingLength(s);
        var length = s.length - paddingLength;
        var out = new Uint8Array(this.maxDecodedLength(length));
        var op = 0;
        var i = 0;
        var haveBad = 0;
        var v0 = 0, v1 = 0, v2 = 0, v3 = 0;
        for (; i < length - 4; i += 4) {
            v0 = this._decodeChar(s.charCodeAt(i + 0));
            v1 = this._decodeChar(s.charCodeAt(i + 1));
            v2 = this._decodeChar(s.charCodeAt(i + 2));
            v3 = this._decodeChar(s.charCodeAt(i + 3));
            out[op++] = (v0 << 2) | (v1 >>> 4);
            out[op++] = (v1 << 4) | (v2 >>> 2);
            out[op++] = (v2 << 6) | v3;
            haveBad |= v0 & INVALID_BYTE;
            haveBad |= v1 & INVALID_BYTE;
            haveBad |= v2 & INVALID_BYTE;
            haveBad |= v3 & INVALID_BYTE;
        }
        if (i < length - 1) {
            v0 = this._decodeChar(s.charCodeAt(i));
            v1 = this._decodeChar(s.charCodeAt(i + 1));
            out[op++] = (v0 << 2) | (v1 >>> 4);
            haveBad |= v0 & INVALID_BYTE;
            haveBad |= v1 & INVALID_BYTE;
        }
        if (i < length - 2) {
            v2 = this._decodeChar(s.charCodeAt(i + 2));
            out[op++] = (v1 << 4) | (v2 >>> 2);
            haveBad |= v2 & INVALID_BYTE;
        }
        if (i < length - 3) {
            v3 = this._decodeChar(s.charCodeAt(i + 3));
            out[op++] = (v2 << 6) | v3;
            haveBad |= v3 & INVALID_BYTE;
        }
        if (haveBad !== 0) {
            throw new Error("Base64Coder: incorrect characters for decoding");
        }
        return out;
    };
    // Standard encoding have the following encoded/decoded ranges,
    // which we need to convert between.
    //
    // ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz 0123456789  +   /
    // Index:   0 - 25                    26 - 51              52 - 61   62  63
    // ASCII:  65 - 90                    97 - 122             48 - 57   43  47
    //
    // Encode 6 bits in b into a new character.
    Coder.prototype._encodeByte = function (b) {
        // Encoding uses constant time operations as follows:
        //
        // 1. Define comparison of A with B using (A - B) >>> 8:
        //          if A > B, then result is positive integer
        //          if A <= B, then result is 0
        //
        // 2. Define selection of C or 0 using bitwise AND: X & C:
        //          if X == 0, then result is 0
        //          if X != 0, then result is C
        //
        // 3. Start with the smallest comparison (b >= 0), which is always
        //    true, so set the result to the starting ASCII value (65).
        //
        // 4. Continue comparing b to higher ASCII values, and selecting
        //    zero if comparison isn't true, otherwise selecting a value
        //    to add to result, which:
        //
        //          a) undoes the previous addition
        //          b) provides new value to add
        //
        var result = b;
        // b >= 0
        result += 65;
        // b > 25
        result += ((25 - b) >>> 8) & ((0 - 65) - 26 + 97);
        // b > 51
        result += ((51 - b) >>> 8) & ((26 - 97) - 52 + 48);
        // b > 61
        result += ((61 - b) >>> 8) & ((52 - 48) - 62 + 43);
        // b > 62
        result += ((62 - b) >>> 8) & ((62 - 43) - 63 + 47);
        return String.fromCharCode(result);
    };
    // Decode a character code into a byte.
    // Must return 256 if character is out of alphabet range.
    Coder.prototype._decodeChar = function (c) {
        // Decoding works similar to encoding: using the same comparison
        // function, but now it works on ranges: result is always incremented
        // by value, but this value becomes zero if the range is not
        // satisfied.
        //
        // Decoding starts with invalid value, 256, which is then
        // subtracted when the range is satisfied. If none of the ranges
        // apply, the function returns 256, which is then checked by
        // the caller to throw error.
        var result = INVALID_BYTE; // start with invalid character
        // c == 43 (c > 42 and c < 44)
        result += (((42 - c) & (c - 44)) >>> 8) & (-INVALID_BYTE + c - 43 + 62);
        // c == 47 (c > 46 and c < 48)
        result += (((46 - c) & (c - 48)) >>> 8) & (-INVALID_BYTE + c - 47 + 63);
        // c > 47 and c < 58
        result += (((47 - c) & (c - 58)) >>> 8) & (-INVALID_BYTE + c - 48 + 52);
        // c > 64 and c < 91
        result += (((64 - c) & (c - 91)) >>> 8) & (-INVALID_BYTE + c - 65 + 0);
        // c > 96 and c < 123
        result += (((96 - c) & (c - 123)) >>> 8) & (-INVALID_BYTE + c - 97 + 26);
        return result;
    };
    Coder.prototype._getPaddingLength = function (s) {
        var paddingLength = 0;
        if (this._paddingCharacter) {
            for (var i = s.length - 1; i >= 0; i--) {
                if (s[i] !== this._paddingCharacter) {
                    break;
                }
                paddingLength++;
            }
            if (s.length < 4 || paddingLength > 2) {
                throw new Error("Base64Coder: incorrect padding");
            }
        }
        return paddingLength;
    };
    return Coder;
}());
exports.Coder = Coder;
var stdCoder = new Coder();
function encode(data) {
    return stdCoder.encode(data);
}
exports.encode = encode;
function decode(s) {
    return stdCoder.decode(s);
}
exports.decode = decode;
/**
 * Implements URL-safe Base64 encoding.
 * (Same as Base64, but '+' is replaced with '-', and '/' with '_').
 *
 * Operates in constant time.
 */
var URLSafeCoder = /** @class */ (function (_super) {
    __extends(URLSafeCoder, _super);
    function URLSafeCoder() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    // URL-safe encoding have the following encoded/decoded ranges:
    //
    // ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz 0123456789  -   _
    // Index:   0 - 25                    26 - 51              52 - 61   62  63
    // ASCII:  65 - 90                    97 - 122             48 - 57   45  95
    //
    URLSafeCoder.prototype._encodeByte = function (b) {
        var result = b;
        // b >= 0
        result += 65;
        // b > 25
        result += ((25 - b) >>> 8) & ((0 - 65) - 26 + 97);
        // b > 51
        result += ((51 - b) >>> 8) & ((26 - 97) - 52 + 48);
        // b > 61
        result += ((61 - b) >>> 8) & ((52 - 48) - 62 + 45);
        // b > 62
        result += ((62 - b) >>> 8) & ((62 - 45) - 63 + 95);
        return String.fromCharCode(result);
    };
    URLSafeCoder.prototype._decodeChar = function (c) {
        var result = INVALID_BYTE;
        // c == 45 (c > 44 and c < 46)
        result += (((44 - c) & (c - 46)) >>> 8) & (-INVALID_BYTE + c - 45 + 62);
        // c == 95 (c > 94 and c < 96)
        result += (((94 - c) & (c - 96)) >>> 8) & (-INVALID_BYTE + c - 95 + 63);
        // c > 47 and c < 58
        result += (((47 - c) & (c - 58)) >>> 8) & (-INVALID_BYTE + c - 48 + 52);
        // c > 64 and c < 91
        result += (((64 - c) & (c - 91)) >>> 8) & (-INVALID_BYTE + c - 65 + 0);
        // c > 96 and c < 123
        result += (((96 - c) & (c - 123)) >>> 8) & (-INVALID_BYTE + c - 97 + 26);
        return result;
    };
    return URLSafeCoder;
}(Coder));
exports.URLSafeCoder = URLSafeCoder;
var urlSafeCoder = new URLSafeCoder();
function encodeURLSafe(data) {
    return urlSafeCoder.encode(data);
}
exports.encodeURLSafe = encodeURLSafe;
function decodeURLSafe(s) {
    return urlSafeCoder.decode(s);
}
exports.decodeURLSafe = decodeURLSafe;
exports.encodedLength = function (length) {
    return stdCoder.encodedLength(length);
};
exports.maxDecodedLength = function (length) {
    return stdCoder.maxDecodedLength(length);
};
exports.decodedLength = function (s) {
    return stdCoder.decodedLength(s);
};
//# sourceMappingURL=base64.js.map

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

// Copyright (C) 2016 Dmitry Chestnykh
// MIT License. See LICENSE file for details.
Object.defineProperty(exports, "__esModule", { value: true });
/**
 * Package utf8 implements UTF-8 encoding and decoding.
 */
var INVALID_UTF16 = "utf8: invalid string";
var INVALID_UTF8 = "utf8: invalid source encoding";
/**
 * Encodes the given string into UTF-8 byte array.
 * Throws if the source string has invalid UTF-16 encoding.
 */
function encode(s) {
    // Calculate result length and allocate output array.
    // encodedLength() also validates string and throws errors,
    // so we don't need repeat validation here.
    var arr = new Uint8Array(encodedLength(s));
    var pos = 0;
    for (var i = 0; i < s.length; i++) {
        var c = s.charCodeAt(i);
        if (c < 0x80) {
            arr[pos++] = c;
        }
        else if (c < 0x800) {
            arr[pos++] = 0xc0 | c >> 6;
            arr[pos++] = 0x80 | c & 0x3f;
        }
        else if (c < 0xd800) {
            arr[pos++] = 0xe0 | c >> 12;
            arr[pos++] = 0x80 | (c >> 6) & 0x3f;
            arr[pos++] = 0x80 | c & 0x3f;
        }
        else {
            i++; // get one more character
            c = (c & 0x3ff) << 10;
            c |= s.charCodeAt(i) & 0x3ff;
            c += 0x10000;
            arr[pos++] = 0xf0 | c >> 18;
            arr[pos++] = 0x80 | (c >> 12) & 0x3f;
            arr[pos++] = 0x80 | (c >> 6) & 0x3f;
            arr[pos++] = 0x80 | c & 0x3f;
        }
    }
    return arr;
}
exports.encode = encode;
/**
 * Returns the number of bytes required to encode the given string into UTF-8.
 * Throws if the source string has invalid UTF-16 encoding.
 */
function encodedLength(s) {
    var result = 0;
    for (var i = 0; i < s.length; i++) {
        var c = s.charCodeAt(i);
        if (c < 0x80) {
            result += 1;
        }
        else if (c < 0x800) {
            result += 2;
        }
        else if (c < 0xd800) {
            result += 3;
        }
        else if (c <= 0xdfff) {
            if (i >= s.length - 1) {
                throw new Error(INVALID_UTF16);
            }
            i++; // "eat" next character
            result += 4;
        }
        else {
            throw new Error(INVALID_UTF16);
        }
    }
    return result;
}
exports.encodedLength = encodedLength;
/**
 * Decodes the given byte array from UTF-8 into a string.
 * Throws if encoding is invalid.
 */
function decode(arr) {
    var chars = [];
    for (var i = 0; i < arr.length; i++) {
        var b = arr[i];
        if (b & 0x80) {
            var min = void 0;
            if (b < 0xe0) {
                // Need 1 more byte.
                if (i >= arr.length) {
                    throw new Error(INVALID_UTF8);
                }
                var n1 = arr[++i];
                if ((n1 & 0xc0) !== 0x80) {
                    throw new Error(INVALID_UTF8);
                }
                b = (b & 0x1f) << 6 | (n1 & 0x3f);
                min = 0x80;
            }
            else if (b < 0xf0) {
                // Need 2 more bytes.
                if (i >= arr.length - 1) {
                    throw new Error(INVALID_UTF8);
                }
                var n1 = arr[++i];
                var n2 = arr[++i];
                if ((n1 & 0xc0) !== 0x80 || (n2 & 0xc0) !== 0x80) {
                    throw new Error(INVALID_UTF8);
                }
                b = (b & 0x0f) << 12 | (n1 & 0x3f) << 6 | (n2 & 0x3f);
                min = 0x800;
            }
            else if (b < 0xf8) {
                // Need 3 more bytes.
                if (i >= arr.length - 2) {
                    throw new Error(INVALID_UTF8);
                }
                var n1 = arr[++i];
                var n2 = arr[++i];
                var n3 = arr[++i];
                if ((n1 & 0xc0) !== 0x80 || (n2 & 0xc0) !== 0x80 || (n3 & 0xc0) !== 0x80) {
                    throw new Error(INVALID_UTF8);
                }
                b = (b & 0x0f) << 18 | (n1 & 0x3f) << 12 | (n2 & 0x3f) << 6 | (n3 & 0x3f);
                min = 0x10000;
            }
            else {
                throw new Error(INVALID_UTF8);
            }
            if (b < min || (b >= 0xd800 && b <= 0xdfff)) {
                throw new Error(INVALID_UTF8);
            }
            if (b >= 0x10000) {
                // Surrogate pair.
                if (b > 0x10ffff) {
                    throw new Error(INVALID_UTF8);
                }
                b -= 0x10000;
                chars.push(String.fromCharCode(0xd800 | (b >> 10)));
                b = 0xdc00 | (b & 0x3ff);
            }
        }
        chars.push(String.fromCharCode(b));
    }
    return chars.join("");
}
exports.decode = decode;
//# sourceMappingURL=utf8.js.map

/***/ }),
/* 2 */
/***/ (function(module, exports, __nested_webpack_require_19967__) {

// required so we don't have to do require('pusher').default etc.
module.exports = __nested_webpack_require_19967__(3).default;


/***/ }),
/* 3 */
/***/ (function(module, __webpack_exports__, __nested_webpack_require_20171__) {

"use strict";
__nested_webpack_require_20171__.r(__webpack_exports__);

// CONCATENATED MODULE: ./src/runtimes/web/dom/script_receiver_factory.ts
var ScriptReceiverFactory = (function () {
    function ScriptReceiverFactory(prefix, name) {
        this.lastId = 0;
        this.prefix = prefix;
        this.name = name;
    }
    ScriptReceiverFactory.prototype.create = function (callback) {
        this.lastId++;
        var number = this.lastId;
        var id = this.prefix + number;
        var name = this.name + '[' + number + ']';
        var called = false;
        var callbackWrapper = function () {
            if (!called) {
                callback.apply(null, arguments);
                called = true;
            }
        };
        this[number] = callbackWrapper;
        return { number: number, id: id, name: name, callback: callbackWrapper };
    };
    ScriptReceiverFactory.prototype.remove = function (receiver) {
        delete this[receiver.number];
    };
    return ScriptReceiverFactory;
}());

var ScriptReceivers = new ScriptReceiverFactory('_pusher_script_', 'Pusher.ScriptReceivers');

// CONCATENATED MODULE: ./src/core/defaults.ts
var Defaults = {
    VERSION: "7.0.3",
    PROTOCOL: 7,
    wsPort: 80,
    wssPort: 443,
    wsPath: '',
    httpHost: 'sockjs.pusher.com',
    httpPort: 80,
    httpsPort: 443,
    httpPath: '/pusher',
    stats_host: 'stats.pusher.com',
    authEndpoint: '/pusher/auth',
    authTransport: 'ajax',
    activityTimeout: 120000,
    pongTimeout: 30000,
    unavailableTimeout: 10000,
    cluster: 'mt1',
    cdn_http: "http://js.pusher.com",
    cdn_https: "https://js.pusher.com",
    dependency_suffix: ""
};
/* harmony default export */ var defaults = (Defaults);

// CONCATENATED MODULE: ./src/runtimes/web/dom/dependency_loader.ts


var dependency_loader_DependencyLoader = (function () {
    function DependencyLoader(options) {
        this.options = options;
        this.receivers = options.receivers || ScriptReceivers;
        this.loading = {};
    }
    DependencyLoader.prototype.load = function (name, options, callback) {
        var self = this;
        if (self.loading[name] && self.loading[name].length > 0) {
            self.loading[name].push(callback);
        }
        else {
            self.loading[name] = [callback];
            var request = runtime.createScriptRequest(self.getPath(name, options));
            var receiver = self.receivers.create(function (error) {
                self.receivers.remove(receiver);
                if (self.loading[name]) {
                    var callbacks = self.loading[name];
                    delete self.loading[name];
                    var successCallback = function (wasSuccessful) {
                        if (!wasSuccessful) {
                            request.cleanup();
                        }
                    };
                    for (var i = 0; i < callbacks.length; i++) {
                        callbacks[i](error, successCallback);
                    }
                }
            });
            request.send(receiver);
        }
    };
    DependencyLoader.prototype.getRoot = function (options) {
        var cdn;
        var protocol = runtime.getDocument().location.protocol;
        if ((options && options.useTLS) || protocol === 'https:') {
            cdn = this.options.cdn_https;
        }
        else {
            cdn = this.options.cdn_http;
        }
        return cdn.replace(/\/*$/, '') + '/' + this.options.version;
    };
    DependencyLoader.prototype.getPath = function (name, options) {
        return this.getRoot(options) + '/' + name + this.options.suffix + '.js';
    };
    return DependencyLoader;
}());
/* harmony default export */ var dependency_loader = (dependency_loader_DependencyLoader);

// CONCATENATED MODULE: ./src/runtimes/web/dom/dependencies.ts



var DependenciesReceivers = new ScriptReceiverFactory('_pusher_dependencies', 'Pusher.DependenciesReceivers');
var Dependencies = new dependency_loader({
    cdn_http: defaults.cdn_http,
    cdn_https: defaults.cdn_https,
    version: defaults.VERSION,
    suffix: defaults.dependency_suffix,
    receivers: DependenciesReceivers
});

// CONCATENATED MODULE: ./src/core/utils/url_store.ts
var urlStore = {
    baseUrl: 'https://pusher.com',
    urls: {
        authenticationEndpoint: {
            path: '/docs/authenticating_users'
        },
        javascriptQuickStart: {
            path: '/docs/javascript_quick_start'
        },
        triggeringClientEvents: {
            path: '/docs/client_api_guide/client_events#trigger-events'
        },
        encryptedChannelSupport: {
            fullUrl: 'https://github.com/pusher/pusher-js/tree/cc491015371a4bde5743d1c87a0fbac0feb53195#encrypted-channel-support'
        }
    }
};
var buildLogSuffix = function (key) {
    var urlPrefix = 'See:';
    var urlObj = urlStore.urls[key];
    if (!urlObj)
        return '';
    var url;
    if (urlObj.fullUrl) {
        url = urlObj.fullUrl;
    }
    else if (urlObj.path) {
        url = urlStore.baseUrl + urlObj.path;
    }
    if (!url)
        return '';
    return urlPrefix + " " + url;
};
/* harmony default export */ var url_store = ({ buildLogSuffix: buildLogSuffix });

// CONCATENATED MODULE: ./src/core/errors.ts
var __extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var BadEventName = (function (_super) {
    __extends(BadEventName, _super);
    function BadEventName(msg) {
        var _newTarget = this.constructor;
        var _this = _super.call(this, msg) || this;
        Object.setPrototypeOf(_this, _newTarget.prototype);
        return _this;
    }
    return BadEventName;
}(Error));

var RequestTimedOut = (function (_super) {
    __extends(RequestTimedOut, _super);
    function RequestTimedOut(msg) {
        var _newTarget = this.constructor;
        var _this = _super.call(this, msg) || this;
        Object.setPrototypeOf(_this, _newTarget.prototype);
        return _this;
    }
    return RequestTimedOut;
}(Error));

var TransportPriorityTooLow = (function (_super) {
    __extends(TransportPriorityTooLow, _super);
    function TransportPriorityTooLow(msg) {
        var _newTarget = this.constructor;
        var _this = _super.call(this, msg) || this;
        Object.setPrototypeOf(_this, _newTarget.prototype);
        return _this;
    }
    return TransportPriorityTooLow;
}(Error));

var TransportClosed = (function (_super) {
    __extends(TransportClosed, _super);
    function TransportClosed(msg) {
        var _newTarget = this.constructor;
        var _this = _super.call(this, msg) || this;
        Object.setPrototypeOf(_this, _newTarget.prototype);
        return _this;
    }
    return TransportClosed;
}(Error));

var UnsupportedFeature = (function (_super) {
    __extends(UnsupportedFeature, _super);
    function UnsupportedFeature(msg) {
        var _newTarget = this.constructor;
        var _this = _super.call(this, msg) || this;
        Object.setPrototypeOf(_this, _newTarget.prototype);
        return _this;
    }
    return UnsupportedFeature;
}(Error));

var UnsupportedTransport = (function (_super) {
    __extends(UnsupportedTransport, _super);
    function UnsupportedTransport(msg) {
        var _newTarget = this.constructor;
        var _this = _super.call(this, msg) || this;
        Object.setPrototypeOf(_this, _newTarget.prototype);
        return _this;
    }
    return UnsupportedTransport;
}(Error));

var UnsupportedStrategy = (function (_super) {
    __extends(UnsupportedStrategy, _super);
    function UnsupportedStrategy(msg) {
        var _newTarget = this.constructor;
        var _this = _super.call(this, msg) || this;
        Object.setPrototypeOf(_this, _newTarget.prototype);
        return _this;
    }
    return UnsupportedStrategy;
}(Error));

var HTTPAuthError = (function (_super) {
    __extends(HTTPAuthError, _super);
    function HTTPAuthError(status, msg) {
        var _newTarget = this.constructor;
        var _this = _super.call(this, msg) || this;
        _this.status = status;
        Object.setPrototypeOf(_this, _newTarget.prototype);
        return _this;
    }
    return HTTPAuthError;
}(Error));


// CONCATENATED MODULE: ./src/runtimes/isomorphic/auth/xhr_auth.ts



var ajax = function (context, socketId, callback) {
    var self = this, xhr;
    xhr = runtime.createXHR();
    xhr.open('POST', self.options.authEndpoint, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    for (var headerName in this.authOptions.headers) {
        xhr.setRequestHeader(headerName, this.authOptions.headers[headerName]);
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var data = void 0;
                var parsed = false;
                try {
                    data = JSON.parse(xhr.responseText);
                    parsed = true;
                }
                catch (e) {
                    callback(new HTTPAuthError(200, 'JSON returned from auth endpoint was invalid, yet status code was 200. Data was: ' +
                        xhr.responseText), { auth: '' });
                }
                if (parsed) {
                    callback(null, data);
                }
            }
            else {
                var suffix = url_store.buildLogSuffix('authenticationEndpoint');
                callback(new HTTPAuthError(xhr.status, 'Unable to retrieve auth string from auth endpoint - ' +
                    ("received status: " + xhr.status + " from " + self.options.authEndpoint + ". ") +
                    ("Clients must be authenticated to join private or presence channels. " + suffix)), { auth: '' });
            }
        }
    };
    xhr.send(this.composeQuery(socketId));
    return xhr;
};
/* harmony default export */ var xhr_auth = (ajax);

// CONCATENATED MODULE: ./src/core/base64.ts
function encode(s) {
    return btoa(utob(s));
}
var fromCharCode = String.fromCharCode;
var b64chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
var b64tab = {};
for (var base64_i = 0, l = b64chars.length; base64_i < l; base64_i++) {
    b64tab[b64chars.charAt(base64_i)] = base64_i;
}
var cb_utob = function (c) {
    var cc = c.charCodeAt(0);
    return cc < 0x80
        ? c
        : cc < 0x800
            ? fromCharCode(0xc0 | (cc >>> 6)) + fromCharCode(0x80 | (cc & 0x3f))
            : fromCharCode(0xe0 | ((cc >>> 12) & 0x0f)) +
                fromCharCode(0x80 | ((cc >>> 6) & 0x3f)) +
                fromCharCode(0x80 | (cc & 0x3f));
};
var utob = function (u) {
    return u.replace(/[^\x00-\x7F]/g, cb_utob);
};
var cb_encode = function (ccc) {
    var padlen = [0, 2, 1][ccc.length % 3];
    var ord = (ccc.charCodeAt(0) << 16) |
        ((ccc.length > 1 ? ccc.charCodeAt(1) : 0) << 8) |
        (ccc.length > 2 ? ccc.charCodeAt(2) : 0);
    var chars = [
        b64chars.charAt(ord >>> 18),
        b64chars.charAt((ord >>> 12) & 63),
        padlen >= 2 ? '=' : b64chars.charAt((ord >>> 6) & 63),
        padlen >= 1 ? '=' : b64chars.charAt(ord & 63)
    ];
    return chars.join('');
};
var btoa = window.btoa ||
    function (b) {
        return b.replace(/[\s\S]{1,3}/g, cb_encode);
    };

// CONCATENATED MODULE: ./src/core/utils/timers/abstract_timer.ts
var Timer = (function () {
    function Timer(set, clear, delay, callback) {
        var _this = this;
        this.clear = clear;
        this.timer = set(function () {
            if (_this.timer) {
                _this.timer = callback(_this.timer);
            }
        }, delay);
    }
    Timer.prototype.isRunning = function () {
        return this.timer !== null;
    };
    Timer.prototype.ensureAborted = function () {
        if (this.timer) {
            this.clear(this.timer);
            this.timer = null;
        }
    };
    return Timer;
}());
/* harmony default export */ var abstract_timer = (Timer);

// CONCATENATED MODULE: ./src/core/utils/timers/index.ts
var timers_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

function timers_clearTimeout(timer) {
    window.clearTimeout(timer);
}
function timers_clearInterval(timer) {
    window.clearInterval(timer);
}
var OneOffTimer = (function (_super) {
    timers_extends(OneOffTimer, _super);
    function OneOffTimer(delay, callback) {
        return _super.call(this, setTimeout, timers_clearTimeout, delay, function (timer) {
            callback();
            return null;
        }) || this;
    }
    return OneOffTimer;
}(abstract_timer));

var PeriodicTimer = (function (_super) {
    timers_extends(PeriodicTimer, _super);
    function PeriodicTimer(delay, callback) {
        return _super.call(this, setInterval, timers_clearInterval, delay, function (timer) {
            callback();
            return timer;
        }) || this;
    }
    return PeriodicTimer;
}(abstract_timer));


// CONCATENATED MODULE: ./src/core/util.ts

var Util = {
    now: function () {
        if (Date.now) {
            return Date.now();
        }
        else {
            return new Date().valueOf();
        }
    },
    defer: function (callback) {
        return new OneOffTimer(0, callback);
    },
    method: function (name) {
        var args = [];
        for (var _i = 1; _i < arguments.length; _i++) {
            args[_i - 1] = arguments[_i];
        }
        var boundArguments = Array.prototype.slice.call(arguments, 1);
        return function (object) {
            return object[name].apply(object, boundArguments.concat(arguments));
        };
    }
};
/* harmony default export */ var util = (Util);

// CONCATENATED MODULE: ./src/core/utils/collections.ts


function extend(target) {
    var sources = [];
    for (var _i = 1; _i < arguments.length; _i++) {
        sources[_i - 1] = arguments[_i];
    }
    for (var i = 0; i < sources.length; i++) {
        var extensions = sources[i];
        for (var property in extensions) {
            if (extensions[property] &&
                extensions[property].constructor &&
                extensions[property].constructor === Object) {
                target[property] = extend(target[property] || {}, extensions[property]);
            }
            else {
                target[property] = extensions[property];
            }
        }
    }
    return target;
}
function stringify() {
    var m = ['Pusher'];
    for (var i = 0; i < arguments.length; i++) {
        if (typeof arguments[i] === 'string') {
            m.push(arguments[i]);
        }
        else {
            m.push(safeJSONStringify(arguments[i]));
        }
    }
    return m.join(' : ');
}
function arrayIndexOf(array, item) {
    var nativeIndexOf = Array.prototype.indexOf;
    if (array === null) {
        return -1;
    }
    if (nativeIndexOf && array.indexOf === nativeIndexOf) {
        return array.indexOf(item);
    }
    for (var i = 0, l = array.length; i < l; i++) {
        if (array[i] === item) {
            return i;
        }
    }
    return -1;
}
function objectApply(object, f) {
    for (var key in object) {
        if (Object.prototype.hasOwnProperty.call(object, key)) {
            f(object[key], key, object);
        }
    }
}
function keys(object) {
    var keys = [];
    objectApply(object, function (_, key) {
        keys.push(key);
    });
    return keys;
}
function values(object) {
    var values = [];
    objectApply(object, function (value) {
        values.push(value);
    });
    return values;
}
function apply(array, f, context) {
    for (var i = 0; i < array.length; i++) {
        f.call(context || window, array[i], i, array);
    }
}
function map(array, f) {
    var result = [];
    for (var i = 0; i < array.length; i++) {
        result.push(f(array[i], i, array, result));
    }
    return result;
}
function mapObject(object, f) {
    var result = {};
    objectApply(object, function (value, key) {
        result[key] = f(value);
    });
    return result;
}
function filter(array, test) {
    test =
        test ||
            function (value) {
                return !!value;
            };
    var result = [];
    for (var i = 0; i < array.length; i++) {
        if (test(array[i], i, array, result)) {
            result.push(array[i]);
        }
    }
    return result;
}
function filterObject(object, test) {
    var result = {};
    objectApply(object, function (value, key) {
        if ((test && test(value, key, object, result)) || Boolean(value)) {
            result[key] = value;
        }
    });
    return result;
}
function flatten(object) {
    var result = [];
    objectApply(object, function (value, key) {
        result.push([key, value]);
    });
    return result;
}
function any(array, test) {
    for (var i = 0; i < array.length; i++) {
        if (test(array[i], i, array)) {
            return true;
        }
    }
    return false;
}
function collections_all(array, test) {
    for (var i = 0; i < array.length; i++) {
        if (!test(array[i], i, array)) {
            return false;
        }
    }
    return true;
}
function encodeParamsObject(data) {
    return mapObject(data, function (value) {
        if (typeof value === 'object') {
            value = safeJSONStringify(value);
        }
        return encodeURIComponent(encode(value.toString()));
    });
}
function buildQueryString(data) {
    var params = filterObject(data, function (value) {
        return value !== undefined;
    });
    var query = map(flatten(encodeParamsObject(params)), util.method('join', '=')).join('&');
    return query;
}
function decycleObject(object) {
    var objects = [], paths = [];
    return (function derez(value, path) {
        var i, name, nu;
        switch (typeof value) {
            case 'object':
                if (!value) {
                    return null;
                }
                for (i = 0; i < objects.length; i += 1) {
                    if (objects[i] === value) {
                        return { $ref: paths[i] };
                    }
                }
                objects.push(value);
                paths.push(path);
                if (Object.prototype.toString.apply(value) === '[object Array]') {
                    nu = [];
                    for (i = 0; i < value.length; i += 1) {
                        nu[i] = derez(value[i], path + '[' + i + ']');
                    }
                }
                else {
                    nu = {};
                    for (name in value) {
                        if (Object.prototype.hasOwnProperty.call(value, name)) {
                            nu[name] = derez(value[name], path + '[' + JSON.stringify(name) + ']');
                        }
                    }
                }
                return nu;
            case 'number':
            case 'string':
            case 'boolean':
                return value;
        }
    })(object, '$');
}
function safeJSONStringify(source) {
    try {
        return JSON.stringify(source);
    }
    catch (e) {
        return JSON.stringify(decycleObject(source));
    }
}

// CONCATENATED MODULE: ./src/core/logger.ts


var logger_Logger = (function () {
    function Logger() {
        this.globalLog = function (message) {
            if (window.console && window.console.log) {
                window.console.log(message);
            }
        };
    }
    Logger.prototype.debug = function () {
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        this.log(this.globalLog, args);
    };
    Logger.prototype.warn = function () {
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        this.log(this.globalLogWarn, args);
    };
    Logger.prototype.error = function () {
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        this.log(this.globalLogError, args);
    };
    Logger.prototype.globalLogWarn = function (message) {
        if (window.console && window.console.warn) {
            window.console.warn(message);
        }
        else {
            this.globalLog(message);
        }
    };
    Logger.prototype.globalLogError = function (message) {
        if (window.console && window.console.error) {
            window.console.error(message);
        }
        else {
            this.globalLogWarn(message);
        }
    };
    Logger.prototype.log = function (defaultLoggingFunction) {
        var args = [];
        for (var _i = 1; _i < arguments.length; _i++) {
            args[_i - 1] = arguments[_i];
        }
        var message = stringify.apply(this, arguments);
        if (core_pusher.log) {
            core_pusher.log(message);
        }
        else if (core_pusher.logToConsole) {
            var log = defaultLoggingFunction.bind(this);
            log(message);
        }
    };
    return Logger;
}());
/* harmony default export */ var logger = (new logger_Logger());

// CONCATENATED MODULE: ./src/runtimes/web/auth/jsonp_auth.ts

var jsonp = function (context, socketId, callback) {
    if (this.authOptions.headers !== undefined) {
        logger.warn('To send headers with the auth request, you must use AJAX, rather than JSONP.');
    }
    var callbackName = context.nextAuthCallbackID.toString();
    context.nextAuthCallbackID++;
    var document = context.getDocument();
    var script = document.createElement('script');
    context.auth_callbacks[callbackName] = function (data) {
        callback(null, data);
    };
    var callback_name = "Pusher.auth_callbacks['" + callbackName + "']";
    script.src =
        this.options.authEndpoint +
            '?callback=' +
            encodeURIComponent(callback_name) +
            '&' +
            this.composeQuery(socketId);
    var head = document.getElementsByTagName('head')[0] || document.documentElement;
    head.insertBefore(script, head.firstChild);
};
/* harmony default export */ var jsonp_auth = (jsonp);

// CONCATENATED MODULE: ./src/runtimes/web/dom/script_request.ts
var ScriptRequest = (function () {
    function ScriptRequest(src) {
        this.src = src;
    }
    ScriptRequest.prototype.send = function (receiver) {
        var self = this;
        var errorString = 'Error loading ' + self.src;
        self.script = document.createElement('script');
        self.script.id = receiver.id;
        self.script.src = self.src;
        self.script.type = 'text/javascript';
        self.script.charset = 'UTF-8';
        if (self.script.addEventListener) {
            self.script.onerror = function () {
                receiver.callback(errorString);
            };
            self.script.onload = function () {
                receiver.callback(null);
            };
        }
        else {
            self.script.onreadystatechange = function () {
                if (self.script.readyState === 'loaded' ||
                    self.script.readyState === 'complete') {
                    receiver.callback(null);
                }
            };
        }
        if (self.script.async === undefined &&
            document.attachEvent &&
            /opera/i.test(navigator.userAgent)) {
            self.errorScript = document.createElement('script');
            self.errorScript.id = receiver.id + '_error';
            self.errorScript.text = receiver.name + "('" + errorString + "');";
            self.script.async = self.errorScript.async = false;
        }
        else {
            self.script.async = true;
        }
        var head = document.getElementsByTagName('head')[0];
        head.insertBefore(self.script, head.firstChild);
        if (self.errorScript) {
            head.insertBefore(self.errorScript, self.script.nextSibling);
        }
    };
    ScriptRequest.prototype.cleanup = function () {
        if (this.script) {
            this.script.onload = this.script.onerror = null;
            this.script.onreadystatechange = null;
        }
        if (this.script && this.script.parentNode) {
            this.script.parentNode.removeChild(this.script);
        }
        if (this.errorScript && this.errorScript.parentNode) {
            this.errorScript.parentNode.removeChild(this.errorScript);
        }
        this.script = null;
        this.errorScript = null;
    };
    return ScriptRequest;
}());
/* harmony default export */ var script_request = (ScriptRequest);

// CONCATENATED MODULE: ./src/runtimes/web/dom/jsonp_request.ts


var jsonp_request_JSONPRequest = (function () {
    function JSONPRequest(url, data) {
        this.url = url;
        this.data = data;
    }
    JSONPRequest.prototype.send = function (receiver) {
        if (this.request) {
            return;
        }
        var query = buildQueryString(this.data);
        var url = this.url + '/' + receiver.number + '?' + query;
        this.request = runtime.createScriptRequest(url);
        this.request.send(receiver);
    };
    JSONPRequest.prototype.cleanup = function () {
        if (this.request) {
            this.request.cleanup();
        }
    };
    return JSONPRequest;
}());
/* harmony default export */ var jsonp_request = (jsonp_request_JSONPRequest);

// CONCATENATED MODULE: ./src/runtimes/web/timeline/jsonp_timeline.ts


var getAgent = function (sender, useTLS) {
    return function (data, callback) {
        var scheme = 'http' + (useTLS ? 's' : '') + '://';
        var url = scheme + (sender.host || sender.options.host) + sender.options.path;
        var request = runtime.createJSONPRequest(url, data);
        var receiver = runtime.ScriptReceivers.create(function (error, result) {
            ScriptReceivers.remove(receiver);
            request.cleanup();
            if (result && result.host) {
                sender.host = result.host;
            }
            if (callback) {
                callback(error, result);
            }
        });
        request.send(receiver);
    };
};
var jsonp_timeline_jsonp = {
    name: 'jsonp',
    getAgent: getAgent
};
/* harmony default export */ var jsonp_timeline = (jsonp_timeline_jsonp);

// CONCATENATED MODULE: ./src/core/transports/url_schemes.ts

function getGenericURL(baseScheme, params, path) {
    var scheme = baseScheme + (params.useTLS ? 's' : '');
    var host = params.useTLS ? params.hostTLS : params.hostNonTLS;
    return scheme + '://' + host + path;
}
function getGenericPath(key, queryString) {
    var path = '/app/' + key;
    var query = '?protocol=' +
        defaults.PROTOCOL +
        '&client=js' +
        '&version=' +
        defaults.VERSION +
        (queryString ? '&' + queryString : '');
    return path + query;
}
var ws = {
    getInitial: function (key, params) {
        var path = (params.httpPath || '') + getGenericPath(key, 'flash=false');
        return getGenericURL('ws', params, path);
    }
};
var http = {
    getInitial: function (key, params) {
        var path = (params.httpPath || '/pusher') + getGenericPath(key);
        return getGenericURL('http', params, path);
    }
};
var sockjs = {
    getInitial: function (key, params) {
        return getGenericURL('http', params, params.httpPath || '/pusher');
    },
    getPath: function (key, params) {
        return getGenericPath(key);
    }
};

// CONCATENATED MODULE: ./src/core/events/callback_registry.ts

var callback_registry_CallbackRegistry = (function () {
    function CallbackRegistry() {
        this._callbacks = {};
    }
    CallbackRegistry.prototype.get = function (name) {
        return this._callbacks[prefix(name)];
    };
    CallbackRegistry.prototype.add = function (name, callback, context) {
        var prefixedEventName = prefix(name);
        this._callbacks[prefixedEventName] =
            this._callbacks[prefixedEventName] || [];
        this._callbacks[prefixedEventName].push({
            fn: callback,
            context: context
        });
    };
    CallbackRegistry.prototype.remove = function (name, callback, context) {
        if (!name && !callback && !context) {
            this._callbacks = {};
            return;
        }
        var names = name ? [prefix(name)] : keys(this._callbacks);
        if (callback || context) {
            this.removeCallback(names, callback, context);
        }
        else {
            this.removeAllCallbacks(names);
        }
    };
    CallbackRegistry.prototype.removeCallback = function (names, callback, context) {
        apply(names, function (name) {
            this._callbacks[name] = filter(this._callbacks[name] || [], function (binding) {
                return ((callback && callback !== binding.fn) ||
                    (context && context !== binding.context));
            });
            if (this._callbacks[name].length === 0) {
                delete this._callbacks[name];
            }
        }, this);
    };
    CallbackRegistry.prototype.removeAllCallbacks = function (names) {
        apply(names, function (name) {
            delete this._callbacks[name];
        }, this);
    };
    return CallbackRegistry;
}());
/* harmony default export */ var callback_registry = (callback_registry_CallbackRegistry);
function prefix(name) {
    return '_' + name;
}

// CONCATENATED MODULE: ./src/core/events/dispatcher.ts


var dispatcher_Dispatcher = (function () {
    function Dispatcher(failThrough) {
        this.callbacks = new callback_registry();
        this.global_callbacks = [];
        this.failThrough = failThrough;
    }
    Dispatcher.prototype.bind = function (eventName, callback, context) {
        this.callbacks.add(eventName, callback, context);
        return this;
    };
    Dispatcher.prototype.bind_global = function (callback) {
        this.global_callbacks.push(callback);
        return this;
    };
    Dispatcher.prototype.unbind = function (eventName, callback, context) {
        this.callbacks.remove(eventName, callback, context);
        return this;
    };
    Dispatcher.prototype.unbind_global = function (callback) {
        if (!callback) {
            this.global_callbacks = [];
            return this;
        }
        this.global_callbacks = filter(this.global_callbacks || [], function (c) { return c !== callback; });
        return this;
    };
    Dispatcher.prototype.unbind_all = function () {
        this.unbind();
        this.unbind_global();
        return this;
    };
    Dispatcher.prototype.emit = function (eventName, data, metadata) {
        for (var i = 0; i < this.global_callbacks.length; i++) {
            this.global_callbacks[i](eventName, data);
        }
        var callbacks = this.callbacks.get(eventName);
        var args = [];
        if (metadata) {
            args.push(data, metadata);
        }
        else if (data) {
            args.push(data);
        }
        if (callbacks && callbacks.length > 0) {
            for (var i = 0; i < callbacks.length; i++) {
                callbacks[i].fn.apply(callbacks[i].context || window, args);
            }
        }
        else if (this.failThrough) {
            this.failThrough(eventName, data);
        }
        return this;
    };
    return Dispatcher;
}());
/* harmony default export */ var dispatcher = (dispatcher_Dispatcher);

// CONCATENATED MODULE: ./src/core/transports/transport_connection.ts
var transport_connection_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();





var transport_connection_TransportConnection = (function (_super) {
    transport_connection_extends(TransportConnection, _super);
    function TransportConnection(hooks, name, priority, key, options) {
        var _this = _super.call(this) || this;
        _this.initialize = runtime.transportConnectionInitializer;
        _this.hooks = hooks;
        _this.name = name;
        _this.priority = priority;
        _this.key = key;
        _this.options = options;
        _this.state = 'new';
        _this.timeline = options.timeline;
        _this.activityTimeout = options.activityTimeout;
        _this.id = _this.timeline.generateUniqueID();
        return _this;
    }
    TransportConnection.prototype.handlesActivityChecks = function () {
        return Boolean(this.hooks.handlesActivityChecks);
    };
    TransportConnection.prototype.supportsPing = function () {
        return Boolean(this.hooks.supportsPing);
    };
    TransportConnection.prototype.connect = function () {
        var _this = this;
        if (this.socket || this.state !== 'initialized') {
            return false;
        }
        var url = this.hooks.urls.getInitial(this.key, this.options);
        try {
            this.socket = this.hooks.getSocket(url, this.options);
        }
        catch (e) {
            util.defer(function () {
                _this.onError(e);
                _this.changeState('closed');
            });
            return false;
        }
        this.bindListeners();
        logger.debug('Connecting', { transport: this.name, url: url });
        this.changeState('connecting');
        return true;
    };
    TransportConnection.prototype.close = function () {
        if (this.socket) {
            this.socket.close();
            return true;
        }
        else {
            return false;
        }
    };
    TransportConnection.prototype.send = function (data) {
        var _this = this;
        if (this.state === 'open') {
            util.defer(function () {
                if (_this.socket) {
                    _this.socket.send(data);
                }
            });
            return true;
        }
        else {
            return false;
        }
    };
    TransportConnection.prototype.ping = function () {
        if (this.state === 'open' && this.supportsPing()) {
            this.socket.ping();
        }
    };
    TransportConnection.prototype.onOpen = function () {
        if (this.hooks.beforeOpen) {
            this.hooks.beforeOpen(this.socket, this.hooks.urls.getPath(this.key, this.options));
        }
        this.changeState('open');
        this.socket.onopen = undefined;
    };
    TransportConnection.prototype.onError = function (error) {
        this.emit('error', { type: 'WebSocketError', error: error });
        this.timeline.error(this.buildTimelineMessage({ error: error.toString() }));
    };
    TransportConnection.prototype.onClose = function (closeEvent) {
        if (closeEvent) {
            this.changeState('closed', {
                code: closeEvent.code,
                reason: closeEvent.reason,
                wasClean: closeEvent.wasClean
            });
        }
        else {
            this.changeState('closed');
        }
        this.unbindListeners();
        this.socket = undefined;
    };
    TransportConnection.prototype.onMessage = function (message) {
        this.emit('message', message);
    };
    TransportConnection.prototype.onActivity = function () {
        this.emit('activity');
    };
    TransportConnection.prototype.bindListeners = function () {
        var _this = this;
        this.socket.onopen = function () {
            _this.onOpen();
        };
        this.socket.onerror = function (error) {
            _this.onError(error);
        };
        this.socket.onclose = function (closeEvent) {
            _this.onClose(closeEvent);
        };
        this.socket.onmessage = function (message) {
            _this.onMessage(message);
        };
        if (this.supportsPing()) {
            this.socket.onactivity = function () {
                _this.onActivity();
            };
        }
    };
    TransportConnection.prototype.unbindListeners = function () {
        if (this.socket) {
            this.socket.onopen = undefined;
            this.socket.onerror = undefined;
            this.socket.onclose = undefined;
            this.socket.onmessage = undefined;
            if (this.supportsPing()) {
                this.socket.onactivity = undefined;
            }
        }
    };
    TransportConnection.prototype.changeState = function (state, params) {
        this.state = state;
        this.timeline.info(this.buildTimelineMessage({
            state: state,
            params: params
        }));
        this.emit(state, params);
    };
    TransportConnection.prototype.buildTimelineMessage = function (message) {
        return extend({ cid: this.id }, message);
    };
    return TransportConnection;
}(dispatcher));
/* harmony default export */ var transport_connection = (transport_connection_TransportConnection);

// CONCATENATED MODULE: ./src/core/transports/transport.ts

var transport_Transport = (function () {
    function Transport(hooks) {
        this.hooks = hooks;
    }
    Transport.prototype.isSupported = function (environment) {
        return this.hooks.isSupported(environment);
    };
    Transport.prototype.createConnection = function (name, priority, key, options) {
        return new transport_connection(this.hooks, name, priority, key, options);
    };
    return Transport;
}());
/* harmony default export */ var transports_transport = (transport_Transport);

// CONCATENATED MODULE: ./src/runtimes/isomorphic/transports/transports.ts




var WSTransport = new transports_transport({
    urls: ws,
    handlesActivityChecks: false,
    supportsPing: false,
    isInitialized: function () {
        return Boolean(runtime.getWebSocketAPI());
    },
    isSupported: function () {
        return Boolean(runtime.getWebSocketAPI());
    },
    getSocket: function (url) {
        return runtime.createWebSocket(url);
    }
});
var httpConfiguration = {
    urls: http,
    handlesActivityChecks: false,
    supportsPing: true,
    isInitialized: function () {
        return true;
    }
};
var streamingConfiguration = extend({
    getSocket: function (url) {
        return runtime.HTTPFactory.createStreamingSocket(url);
    }
}, httpConfiguration);
var pollingConfiguration = extend({
    getSocket: function (url) {
        return runtime.HTTPFactory.createPollingSocket(url);
    }
}, httpConfiguration);
var xhrConfiguration = {
    isSupported: function () {
        return runtime.isXHRSupported();
    }
};
var XHRStreamingTransport = new transports_transport((extend({}, streamingConfiguration, xhrConfiguration)));
var XHRPollingTransport = new transports_transport(extend({}, pollingConfiguration, xhrConfiguration));
var Transports = {
    ws: WSTransport,
    xhr_streaming: XHRStreamingTransport,
    xhr_polling: XHRPollingTransport
};
/* harmony default export */ var transports = (Transports);

// CONCATENATED MODULE: ./src/runtimes/web/transports/transports.ts






var SockJSTransport = new transports_transport({
    file: 'sockjs',
    urls: sockjs,
    handlesActivityChecks: true,
    supportsPing: false,
    isSupported: function () {
        return true;
    },
    isInitialized: function () {
        return window.SockJS !== undefined;
    },
    getSocket: function (url, options) {
        return new window.SockJS(url, null, {
            js_path: Dependencies.getPath('sockjs', {
                useTLS: options.useTLS
            }),
            ignore_null_origin: options.ignoreNullOrigin
        });
    },
    beforeOpen: function (socket, path) {
        socket.send(JSON.stringify({
            path: path
        }));
    }
});
var xdrConfiguration = {
    isSupported: function (environment) {
        var yes = runtime.isXDRSupported(environment.useTLS);
        return yes;
    }
};
var XDRStreamingTransport = new transports_transport((extend({}, streamingConfiguration, xdrConfiguration)));
var XDRPollingTransport = new transports_transport(extend({}, pollingConfiguration, xdrConfiguration));
transports.xdr_streaming = XDRStreamingTransport;
transports.xdr_polling = XDRPollingTransport;
transports.sockjs = SockJSTransport;
/* harmony default export */ var transports_transports = (transports);

// CONCATENATED MODULE: ./src/runtimes/web/net_info.ts
var net_info_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

var NetInfo = (function (_super) {
    net_info_extends(NetInfo, _super);
    function NetInfo() {
        var _this = _super.call(this) || this;
        var self = _this;
        if (window.addEventListener !== undefined) {
            window.addEventListener('online', function () {
                self.emit('online');
            }, false);
            window.addEventListener('offline', function () {
                self.emit('offline');
            }, false);
        }
        return _this;
    }
    NetInfo.prototype.isOnline = function () {
        if (window.navigator.onLine === undefined) {
            return true;
        }
        else {
            return window.navigator.onLine;
        }
    };
    return NetInfo;
}(dispatcher));

var net_info_Network = new NetInfo();

// CONCATENATED MODULE: ./src/core/transports/assistant_to_the_transport_manager.ts


var assistant_to_the_transport_manager_AssistantToTheTransportManager = (function () {
    function AssistantToTheTransportManager(manager, transport, options) {
        this.manager = manager;
        this.transport = transport;
        this.minPingDelay = options.minPingDelay;
        this.maxPingDelay = options.maxPingDelay;
        this.pingDelay = undefined;
    }
    AssistantToTheTransportManager.prototype.createConnection = function (name, priority, key, options) {
        var _this = this;
        options = extend({}, options, {
            activityTimeout: this.pingDelay
        });
        var connection = this.transport.createConnection(name, priority, key, options);
        var openTimestamp = null;
        var onOpen = function () {
            connection.unbind('open', onOpen);
            connection.bind('closed', onClosed);
            openTimestamp = util.now();
        };
        var onClosed = function (closeEvent) {
            connection.unbind('closed', onClosed);
            if (closeEvent.code === 1002 || closeEvent.code === 1003) {
                _this.manager.reportDeath();
            }
            else if (!closeEvent.wasClean && openTimestamp) {
                var lifespan = util.now() - openTimestamp;
                if (lifespan < 2 * _this.maxPingDelay) {
                    _this.manager.reportDeath();
                    _this.pingDelay = Math.max(lifespan / 2, _this.minPingDelay);
                }
            }
        };
        connection.bind('open', onOpen);
        return connection;
    };
    AssistantToTheTransportManager.prototype.isSupported = function (environment) {
        return this.manager.isAlive() && this.transport.isSupported(environment);
    };
    return AssistantToTheTransportManager;
}());
/* harmony default export */ var assistant_to_the_transport_manager = (assistant_to_the_transport_manager_AssistantToTheTransportManager);

// CONCATENATED MODULE: ./src/core/connection/protocol/protocol.ts
var Protocol = {
    decodeMessage: function (messageEvent) {
        try {
            var messageData = JSON.parse(messageEvent.data);
            var pusherEventData = messageData.data;
            if (typeof pusherEventData === 'string') {
                try {
                    pusherEventData = JSON.parse(messageData.data);
                }
                catch (e) { }
            }
            var pusherEvent = {
                event: messageData.event,
                channel: messageData.channel,
                data: pusherEventData
            };
            if (messageData.user_id) {
                pusherEvent.user_id = messageData.user_id;
            }
            return pusherEvent;
        }
        catch (e) {
            throw { type: 'MessageParseError', error: e, data: messageEvent.data };
        }
    },
    encodeMessage: function (event) {
        return JSON.stringify(event);
    },
    processHandshake: function (messageEvent) {
        var message = Protocol.decodeMessage(messageEvent);
        if (message.event === 'pusher:connection_established') {
            if (!message.data.activity_timeout) {
                throw 'No activity timeout specified in handshake';
            }
            return {
                action: 'connected',
                id: message.data.socket_id,
                activityTimeout: message.data.activity_timeout * 1000
            };
        }
        else if (message.event === 'pusher:error') {
            return {
                action: this.getCloseAction(message.data),
                error: this.getCloseError(message.data)
            };
        }
        else {
            throw 'Invalid handshake';
        }
    },
    getCloseAction: function (closeEvent) {
        if (closeEvent.code < 4000) {
            if (closeEvent.code >= 1002 && closeEvent.code <= 1004) {
                return 'backoff';
            }
            else {
                return null;
            }
        }
        else if (closeEvent.code === 4000) {
            return 'tls_only';
        }
        else if (closeEvent.code < 4100) {
            return 'refused';
        }
        else if (closeEvent.code < 4200) {
            return 'backoff';
        }
        else if (closeEvent.code < 4300) {
            return 'retry';
        }
        else {
            return 'refused';
        }
    },
    getCloseError: function (closeEvent) {
        if (closeEvent.code !== 1000 && closeEvent.code !== 1001) {
            return {
                type: 'PusherError',
                data: {
                    code: closeEvent.code,
                    message: closeEvent.reason || closeEvent.message
                }
            };
        }
        else {
            return null;
        }
    }
};
/* harmony default export */ var protocol_protocol = (Protocol);

// CONCATENATED MODULE: ./src/core/connection/connection.ts
var connection_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();




var connection_Connection = (function (_super) {
    connection_extends(Connection, _super);
    function Connection(id, transport) {
        var _this = _super.call(this) || this;
        _this.id = id;
        _this.transport = transport;
        _this.activityTimeout = transport.activityTimeout;
        _this.bindListeners();
        return _this;
    }
    Connection.prototype.handlesActivityChecks = function () {
        return this.transport.handlesActivityChecks();
    };
    Connection.prototype.send = function (data) {
        return this.transport.send(data);
    };
    Connection.prototype.send_event = function (name, data, channel) {
        var event = { event: name, data: data };
        if (channel) {
            event.channel = channel;
        }
        logger.debug('Event sent', event);
        return this.send(protocol_protocol.encodeMessage(event));
    };
    Connection.prototype.ping = function () {
        if (this.transport.supportsPing()) {
            this.transport.ping();
        }
        else {
            this.send_event('pusher:ping', {});
        }
    };
    Connection.prototype.close = function () {
        this.transport.close();
    };
    Connection.prototype.bindListeners = function () {
        var _this = this;
        var listeners = {
            message: function (messageEvent) {
                var pusherEvent;
                try {
                    pusherEvent = protocol_protocol.decodeMessage(messageEvent);
                }
                catch (e) {
                    _this.emit('error', {
                        type: 'MessageParseError',
                        error: e,
                        data: messageEvent.data
                    });
                }
                if (pusherEvent !== undefined) {
                    logger.debug('Event recd', pusherEvent);
                    switch (pusherEvent.event) {
                        case 'pusher:error':
                            _this.emit('error', {
                                type: 'PusherError',
                                data: pusherEvent.data
                            });
                            break;
                        case 'pusher:ping':
                            _this.emit('ping');
                            break;
                        case 'pusher:pong':
                            _this.emit('pong');
                            break;
                    }
                    _this.emit('message', pusherEvent);
                }
            },
            activity: function () {
                _this.emit('activity');
            },
            error: function (error) {
                _this.emit('error', error);
            },
            closed: function (closeEvent) {
                unbindListeners();
                if (closeEvent && closeEvent.code) {
                    _this.handleCloseEvent(closeEvent);
                }
                _this.transport = null;
                _this.emit('closed');
            }
        };
        var unbindListeners = function () {
            objectApply(listeners, function (listener, event) {
                _this.transport.unbind(event, listener);
            });
        };
        objectApply(listeners, function (listener, event) {
            _this.transport.bind(event, listener);
        });
    };
    Connection.prototype.handleCloseEvent = function (closeEvent) {
        var action = protocol_protocol.getCloseAction(closeEvent);
        var error = protocol_protocol.getCloseError(closeEvent);
        if (error) {
            this.emit('error', error);
        }
        if (action) {
            this.emit(action, { action: action, error: error });
        }
    };
    return Connection;
}(dispatcher));
/* harmony default export */ var connection_connection = (connection_Connection);

// CONCATENATED MODULE: ./src/core/connection/handshake/index.ts



var handshake_Handshake = (function () {
    function Handshake(transport, callback) {
        this.transport = transport;
        this.callback = callback;
        this.bindListeners();
    }
    Handshake.prototype.close = function () {
        this.unbindListeners();
        this.transport.close();
    };
    Handshake.prototype.bindListeners = function () {
        var _this = this;
        this.onMessage = function (m) {
            _this.unbindListeners();
            var result;
            try {
                result = protocol_protocol.processHandshake(m);
            }
            catch (e) {
                _this.finish('error', { error: e });
                _this.transport.close();
                return;
            }
            if (result.action === 'connected') {
                _this.finish('connected', {
                    connection: new connection_connection(result.id, _this.transport),
                    activityTimeout: result.activityTimeout
                });
            }
            else {
                _this.finish(result.action, { error: result.error });
                _this.transport.close();
            }
        };
        this.onClosed = function (closeEvent) {
            _this.unbindListeners();
            var action = protocol_protocol.getCloseAction(closeEvent) || 'backoff';
            var error = protocol_protocol.getCloseError(closeEvent);
            _this.finish(action, { error: error });
        };
        this.transport.bind('message', this.onMessage);
        this.transport.bind('closed', this.onClosed);
    };
    Handshake.prototype.unbindListeners = function () {
        this.transport.unbind('message', this.onMessage);
        this.transport.unbind('closed', this.onClosed);
    };
    Handshake.prototype.finish = function (action, params) {
        this.callback(extend({ transport: this.transport, action: action }, params));
    };
    return Handshake;
}());
/* harmony default export */ var connection_handshake = (handshake_Handshake);

// CONCATENATED MODULE: ./src/core/auth/pusher_authorizer.ts

var pusher_authorizer_PusherAuthorizer = (function () {
    function PusherAuthorizer(channel, options) {
        this.channel = channel;
        var authTransport = options.authTransport;
        if (typeof runtime.getAuthorizers()[authTransport] === 'undefined') {
            throw "'" + authTransport + "' is not a recognized auth transport";
        }
        this.type = authTransport;
        this.options = options;
        this.authOptions = options.auth || {};
    }
    PusherAuthorizer.prototype.composeQuery = function (socketId) {
        var query = 'socket_id=' +
            encodeURIComponent(socketId) +
            '&channel_name=' +
            encodeURIComponent(this.channel.name);
        for (var i in this.authOptions.params) {
            query +=
                '&' +
                    encodeURIComponent(i) +
                    '=' +
                    encodeURIComponent(this.authOptions.params[i]);
        }
        return query;
    };
    PusherAuthorizer.prototype.authorize = function (socketId, callback) {
        PusherAuthorizer.authorizers =
            PusherAuthorizer.authorizers || runtime.getAuthorizers();
        PusherAuthorizer.authorizers[this.type].call(this, runtime, socketId, callback);
    };
    return PusherAuthorizer;
}());
/* harmony default export */ var pusher_authorizer = (pusher_authorizer_PusherAuthorizer);

// CONCATENATED MODULE: ./src/core/timeline/timeline_sender.ts

var timeline_sender_TimelineSender = (function () {
    function TimelineSender(timeline, options) {
        this.timeline = timeline;
        this.options = options || {};
    }
    TimelineSender.prototype.send = function (useTLS, callback) {
        if (this.timeline.isEmpty()) {
            return;
        }
        this.timeline.send(runtime.TimelineTransport.getAgent(this, useTLS), callback);
    };
    return TimelineSender;
}());
/* harmony default export */ var timeline_sender = (timeline_sender_TimelineSender);

// CONCATENATED MODULE: ./src/core/channels/channel.ts
var channel_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();





var channel_Channel = (function (_super) {
    channel_extends(Channel, _super);
    function Channel(name, pusher) {
        var _this = _super.call(this, function (event, data) {
            logger.debug('No callbacks on ' + name + ' for ' + event);
        }) || this;
        _this.name = name;
        _this.pusher = pusher;
        _this.subscribed = false;
        _this.subscriptionPending = false;
        _this.subscriptionCancelled = false;
        return _this;
    }
    Channel.prototype.authorize = function (socketId, callback) {
        return callback(null, { auth: '' });
    };
    Channel.prototype.trigger = function (event, data) {
        if (event.indexOf('client-') !== 0) {
            throw new BadEventName("Event '" + event + "' does not start with 'client-'");
        }
        if (!this.subscribed) {
            var suffix = url_store.buildLogSuffix('triggeringClientEvents');
            logger.warn("Client event triggered before channel 'subscription_succeeded' event . " + suffix);
        }
        return this.pusher.send_event(event, data, this.name);
    };
    Channel.prototype.disconnect = function () {
        this.subscribed = false;
        this.subscriptionPending = false;
    };
    Channel.prototype.handleEvent = function (event) {
        var eventName = event.event;
        var data = event.data;
        if (eventName === 'pusher_internal:subscription_succeeded') {
            this.handleSubscriptionSucceededEvent(event);
        }
        else if (eventName.indexOf('pusher_internal:') !== 0) {
            var metadata = {};
            this.emit(eventName, data, metadata);
        }
    };
    Channel.prototype.handleSubscriptionSucceededEvent = function (event) {
        this.subscriptionPending = false;
        this.subscribed = true;
        if (this.subscriptionCancelled) {
            this.pusher.unsubscribe(this.name);
        }
        else {
            this.emit('pusher:subscription_succeeded', event.data);
        }
    };
    Channel.prototype.subscribe = function () {
        var _this = this;
        if (this.subscribed) {
            return;
        }
        this.subscriptionPending = true;
        this.subscriptionCancelled = false;
        this.authorize(this.pusher.connection.socket_id, function (error, data) {
            if (error) {
                _this.subscriptionPending = false;
                logger.error(error.toString());
                _this.emit('pusher:subscription_error', Object.assign({}, {
                    type: 'AuthError',
                    error: error.message
                }, error instanceof HTTPAuthError ? { status: error.status } : {}));
            }
            else {
                _this.pusher.send_event('pusher:subscribe', {
                    auth: data.auth,
                    channel_data: data.channel_data,
                    channel: _this.name
                });
            }
        });
    };
    Channel.prototype.unsubscribe = function () {
        this.subscribed = false;
        this.pusher.send_event('pusher:unsubscribe', {
            channel: this.name
        });
    };
    Channel.prototype.cancelSubscription = function () {
        this.subscriptionCancelled = true;
    };
    Channel.prototype.reinstateSubscription = function () {
        this.subscriptionCancelled = false;
    };
    return Channel;
}(dispatcher));
/* harmony default export */ var channels_channel = (channel_Channel);

// CONCATENATED MODULE: ./src/core/channels/private_channel.ts
var private_channel_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


var private_channel_PrivateChannel = (function (_super) {
    private_channel_extends(PrivateChannel, _super);
    function PrivateChannel() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    PrivateChannel.prototype.authorize = function (socketId, callback) {
        var authorizer = factory.createAuthorizer(this, this.pusher.config);
        return authorizer.authorize(socketId, callback);
    };
    return PrivateChannel;
}(channels_channel));
/* harmony default export */ var private_channel = (private_channel_PrivateChannel);

// CONCATENATED MODULE: ./src/core/channels/members.ts

var members_Members = (function () {
    function Members() {
        this.reset();
    }
    Members.prototype.get = function (id) {
        if (Object.prototype.hasOwnProperty.call(this.members, id)) {
            return {
                id: id,
                info: this.members[id]
            };
        }
        else {
            return null;
        }
    };
    Members.prototype.each = function (callback) {
        var _this = this;
        objectApply(this.members, function (member, id) {
            callback(_this.get(id));
        });
    };
    Members.prototype.setMyID = function (id) {
        this.myID = id;
    };
    Members.prototype.onSubscription = function (subscriptionData) {
        this.members = subscriptionData.presence.hash;
        this.count = subscriptionData.presence.count;
        this.me = this.get(this.myID);
    };
    Members.prototype.addMember = function (memberData) {
        if (this.get(memberData.user_id) === null) {
            this.count++;
        }
        this.members[memberData.user_id] = memberData.user_info;
        return this.get(memberData.user_id);
    };
    Members.prototype.removeMember = function (memberData) {
        var member = this.get(memberData.user_id);
        if (member) {
            delete this.members[memberData.user_id];
            this.count--;
        }
        return member;
    };
    Members.prototype.reset = function () {
        this.members = {};
        this.count = 0;
        this.myID = null;
        this.me = null;
    };
    return Members;
}());
/* harmony default export */ var members = (members_Members);

// CONCATENATED MODULE: ./src/core/channels/presence_channel.ts
var presence_channel_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();




var presence_channel_PresenceChannel = (function (_super) {
    presence_channel_extends(PresenceChannel, _super);
    function PresenceChannel(name, pusher) {
        var _this = _super.call(this, name, pusher) || this;
        _this.members = new members();
        return _this;
    }
    PresenceChannel.prototype.authorize = function (socketId, callback) {
        var _this = this;
        _super.prototype.authorize.call(this, socketId, function (error, authData) {
            if (!error) {
                authData = authData;
                if (authData.channel_data === undefined) {
                    var suffix = url_store.buildLogSuffix('authenticationEndpoint');
                    logger.error("Invalid auth response for channel '" + _this.name + "'," +
                        ("expected 'channel_data' field. " + suffix));
                    callback('Invalid auth response');
                    return;
                }
                var channelData = JSON.parse(authData.channel_data);
                _this.members.setMyID(channelData.user_id);
            }
            callback(error, authData);
        });
    };
    PresenceChannel.prototype.handleEvent = function (event) {
        var eventName = event.event;
        if (eventName.indexOf('pusher_internal:') === 0) {
            this.handleInternalEvent(event);
        }
        else {
            var data = event.data;
            var metadata = {};
            if (event.user_id) {
                metadata.user_id = event.user_id;
            }
            this.emit(eventName, data, metadata);
        }
    };
    PresenceChannel.prototype.handleInternalEvent = function (event) {
        var eventName = event.event;
        var data = event.data;
        switch (eventName) {
            case 'pusher_internal:subscription_succeeded':
                this.handleSubscriptionSucceededEvent(event);
                break;
            case 'pusher_internal:member_added':
                var addedMember = this.members.addMember(data);
                this.emit('pusher:member_added', addedMember);
                break;
            case 'pusher_internal:member_removed':
                var removedMember = this.members.removeMember(data);
                if (removedMember) {
                    this.emit('pusher:member_removed', removedMember);
                }
                break;
        }
    };
    PresenceChannel.prototype.handleSubscriptionSucceededEvent = function (event) {
        this.subscriptionPending = false;
        this.subscribed = true;
        if (this.subscriptionCancelled) {
            this.pusher.unsubscribe(this.name);
        }
        else {
            this.members.onSubscription(event.data);
            this.emit('pusher:subscription_succeeded', this.members);
        }
    };
    PresenceChannel.prototype.disconnect = function () {
        this.members.reset();
        _super.prototype.disconnect.call(this);
    };
    return PresenceChannel;
}(private_channel));
/* harmony default export */ var presence_channel = (presence_channel_PresenceChannel);

// EXTERNAL MODULE: ./node_modules/@stablelib/utf8/lib/utf8.js
var utf8 = __nested_webpack_require_20171__(1);

// EXTERNAL MODULE: ./node_modules/@stablelib/base64/lib/base64.js
var base64 = __nested_webpack_require_20171__(0);

// CONCATENATED MODULE: ./src/core/channels/encrypted_channel.ts
var encrypted_channel_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();





var encrypted_channel_EncryptedChannel = (function (_super) {
    encrypted_channel_extends(EncryptedChannel, _super);
    function EncryptedChannel(name, pusher, nacl) {
        var _this = _super.call(this, name, pusher) || this;
        _this.key = null;
        _this.nacl = nacl;
        return _this;
    }
    EncryptedChannel.prototype.authorize = function (socketId, callback) {
        var _this = this;
        _super.prototype.authorize.call(this, socketId, function (error, authData) {
            if (error) {
                callback(error, authData);
                return;
            }
            var sharedSecret = authData['shared_secret'];
            if (!sharedSecret) {
                callback(new Error("No shared_secret key in auth payload for encrypted channel: " + _this.name), null);
                return;
            }
            _this.key = Object(base64["decode"])(sharedSecret);
            delete authData['shared_secret'];
            callback(null, authData);
        });
    };
    EncryptedChannel.prototype.trigger = function (event, data) {
        throw new UnsupportedFeature('Client events are not currently supported for encrypted channels');
    };
    EncryptedChannel.prototype.handleEvent = function (event) {
        var eventName = event.event;
        var data = event.data;
        if (eventName.indexOf('pusher_internal:') === 0 ||
            eventName.indexOf('pusher:') === 0) {
            _super.prototype.handleEvent.call(this, event);
            return;
        }
        this.handleEncryptedEvent(eventName, data);
    };
    EncryptedChannel.prototype.handleEncryptedEvent = function (event, data) {
        var _this = this;
        if (!this.key) {
            logger.debug('Received encrypted event before key has been retrieved from the authEndpoint');
            return;
        }
        if (!data.ciphertext || !data.nonce) {
            logger.error('Unexpected format for encrypted event, expected object with `ciphertext` and `nonce` fields, got: ' +
                data);
            return;
        }
        var cipherText = Object(base64["decode"])(data.ciphertext);
        if (cipherText.length < this.nacl.secretbox.overheadLength) {
            logger.error("Expected encrypted event ciphertext length to be " + this.nacl.secretbox.overheadLength + ", got: " + cipherText.length);
            return;
        }
        var nonce = Object(base64["decode"])(data.nonce);
        if (nonce.length < this.nacl.secretbox.nonceLength) {
            logger.error("Expected encrypted event nonce length to be " + this.nacl.secretbox.nonceLength + ", got: " + nonce.length);
            return;
        }
        var bytes = this.nacl.secretbox.open(cipherText, nonce, this.key);
        if (bytes === null) {
            logger.debug('Failed to decrypt an event, probably because it was encrypted with a different key. Fetching a new key from the authEndpoint...');
            this.authorize(this.pusher.connection.socket_id, function (error, authData) {
                if (error) {
                    logger.error("Failed to make a request to the authEndpoint: " + authData + ". Unable to fetch new key, so dropping encrypted event");
                    return;
                }
                bytes = _this.nacl.secretbox.open(cipherText, nonce, _this.key);
                if (bytes === null) {
                    logger.error("Failed to decrypt event with new key. Dropping encrypted event");
                    return;
                }
                _this.emit(event, _this.getDataToEmit(bytes));
                return;
            });
            return;
        }
        this.emit(event, this.getDataToEmit(bytes));
    };
    EncryptedChannel.prototype.getDataToEmit = function (bytes) {
        var raw = Object(utf8["decode"])(bytes);
        try {
            return JSON.parse(raw);
        }
        catch (_a) {
            return raw;
        }
    };
    return EncryptedChannel;
}(private_channel));
/* harmony default export */ var encrypted_channel = (encrypted_channel_EncryptedChannel);

// CONCATENATED MODULE: ./src/core/connection/connection_manager.ts
var connection_manager_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();





var connection_manager_ConnectionManager = (function (_super) {
    connection_manager_extends(ConnectionManager, _super);
    function ConnectionManager(key, options) {
        var _this = _super.call(this) || this;
        _this.state = 'initialized';
        _this.connection = null;
        _this.key = key;
        _this.options = options;
        _this.timeline = _this.options.timeline;
        _this.usingTLS = _this.options.useTLS;
        _this.errorCallbacks = _this.buildErrorCallbacks();
        _this.connectionCallbacks = _this.buildConnectionCallbacks(_this.errorCallbacks);
        _this.handshakeCallbacks = _this.buildHandshakeCallbacks(_this.errorCallbacks);
        var Network = runtime.getNetwork();
        Network.bind('online', function () {
            _this.timeline.info({ netinfo: 'online' });
            if (_this.state === 'connecting' || _this.state === 'unavailable') {
                _this.retryIn(0);
            }
        });
        Network.bind('offline', function () {
            _this.timeline.info({ netinfo: 'offline' });
            if (_this.connection) {
                _this.sendActivityCheck();
            }
        });
        _this.updateStrategy();
        return _this;
    }
    ConnectionManager.prototype.connect = function () {
        if (this.connection || this.runner) {
            return;
        }
        if (!this.strategy.isSupported()) {
            this.updateState('failed');
            return;
        }
        this.updateState('connecting');
        this.startConnecting();
        this.setUnavailableTimer();
    };
    ConnectionManager.prototype.send = function (data) {
        if (this.connection) {
            return this.connection.send(data);
        }
        else {
            return false;
        }
    };
    ConnectionManager.prototype.send_event = function (name, data, channel) {
        if (this.connection) {
            return this.connection.send_event(name, data, channel);
        }
        else {
            return false;
        }
    };
    ConnectionManager.prototype.disconnect = function () {
        this.disconnectInternally();
        this.updateState('disconnected');
    };
    ConnectionManager.prototype.isUsingTLS = function () {
        return this.usingTLS;
    };
    ConnectionManager.prototype.startConnecting = function () {
        var _this = this;
        var callback = function (error, handshake) {
            if (error) {
                _this.runner = _this.strategy.connect(0, callback);
            }
            else {
                if (handshake.action === 'error') {
                    _this.emit('error', {
                        type: 'HandshakeError',
                        error: handshake.error
                    });
                    _this.timeline.error({ handshakeError: handshake.error });
                }
                else {
                    _this.abortConnecting();
                    _this.handshakeCallbacks[handshake.action](handshake);
                }
            }
        };
        this.runner = this.strategy.connect(0, callback);
    };
    ConnectionManager.prototype.abortConnecting = function () {
        if (this.runner) {
            this.runner.abort();
            this.runner = null;
        }
    };
    ConnectionManager.prototype.disconnectInternally = function () {
        this.abortConnecting();
        this.clearRetryTimer();
        this.clearUnavailableTimer();
        if (this.connection) {
            var connection = this.abandonConnection();
            connection.close();
        }
    };
    ConnectionManager.prototype.updateStrategy = function () {
        this.strategy = this.options.getStrategy({
            key: this.key,
            timeline: this.timeline,
            useTLS: this.usingTLS
        });
    };
    ConnectionManager.prototype.retryIn = function (delay) {
        var _this = this;
        this.timeline.info({ action: 'retry', delay: delay });
        if (delay > 0) {
            this.emit('connecting_in', Math.round(delay / 1000));
        }
        this.retryTimer = new OneOffTimer(delay || 0, function () {
            _this.disconnectInternally();
            _this.connect();
        });
    };
    ConnectionManager.prototype.clearRetryTimer = function () {
        if (this.retryTimer) {
            this.retryTimer.ensureAborted();
            this.retryTimer = null;
        }
    };
    ConnectionManager.prototype.setUnavailableTimer = function () {
        var _this = this;
        this.unavailableTimer = new OneOffTimer(this.options.unavailableTimeout, function () {
            _this.updateState('unavailable');
        });
    };
    ConnectionManager.prototype.clearUnavailableTimer = function () {
        if (this.unavailableTimer) {
            this.unavailableTimer.ensureAborted();
        }
    };
    ConnectionManager.prototype.sendActivityCheck = function () {
        var _this = this;
        this.stopActivityCheck();
        this.connection.ping();
        this.activityTimer = new OneOffTimer(this.options.pongTimeout, function () {
            _this.timeline.error({ pong_timed_out: _this.options.pongTimeout });
            _this.retryIn(0);
        });
    };
    ConnectionManager.prototype.resetActivityCheck = function () {
        var _this = this;
        this.stopActivityCheck();
        if (this.connection && !this.connection.handlesActivityChecks()) {
            this.activityTimer = new OneOffTimer(this.activityTimeout, function () {
                _this.sendActivityCheck();
            });
        }
    };
    ConnectionManager.prototype.stopActivityCheck = function () {
        if (this.activityTimer) {
            this.activityTimer.ensureAborted();
        }
    };
    ConnectionManager.prototype.buildConnectionCallbacks = function (errorCallbacks) {
        var _this = this;
        return extend({}, errorCallbacks, {
            message: function (message) {
                _this.resetActivityCheck();
                _this.emit('message', message);
            },
            ping: function () {
                _this.send_event('pusher:pong', {});
            },
            activity: function () {
                _this.resetActivityCheck();
            },
            error: function (error) {
                _this.emit('error', error);
            },
            closed: function () {
                _this.abandonConnection();
                if (_this.shouldRetry()) {
                    _this.retryIn(1000);
                }
            }
        });
    };
    ConnectionManager.prototype.buildHandshakeCallbacks = function (errorCallbacks) {
        var _this = this;
        return extend({}, errorCallbacks, {
            connected: function (handshake) {
                _this.activityTimeout = Math.min(_this.options.activityTimeout, handshake.activityTimeout, handshake.connection.activityTimeout || Infinity);
                _this.clearUnavailableTimer();
                _this.setConnection(handshake.connection);
                _this.socket_id = _this.connection.id;
                _this.updateState('connected', { socket_id: _this.socket_id });
            }
        });
    };
    ConnectionManager.prototype.buildErrorCallbacks = function () {
        var _this = this;
        var withErrorEmitted = function (callback) {
            return function (result) {
                if (result.error) {
                    _this.emit('error', { type: 'WebSocketError', error: result.error });
                }
                callback(result);
            };
        };
        return {
            tls_only: withErrorEmitted(function () {
                _this.usingTLS = true;
                _this.updateStrategy();
                _this.retryIn(0);
            }),
            refused: withErrorEmitted(function () {
                _this.disconnect();
            }),
            backoff: withErrorEmitted(function () {
                _this.retryIn(1000);
            }),
            retry: withErrorEmitted(function () {
                _this.retryIn(0);
            })
        };
    };
    ConnectionManager.prototype.setConnection = function (connection) {
        this.connection = connection;
        for (var event in this.connectionCallbacks) {
            this.connection.bind(event, this.connectionCallbacks[event]);
        }
        this.resetActivityCheck();
    };
    ConnectionManager.prototype.abandonConnection = function () {
        if (!this.connection) {
            return;
        }
        this.stopActivityCheck();
        for (var event in this.connectionCallbacks) {
            this.connection.unbind(event, this.connectionCallbacks[event]);
        }
        var connection = this.connection;
        this.connection = null;
        return connection;
    };
    ConnectionManager.prototype.updateState = function (newState, data) {
        var previousState = this.state;
        this.state = newState;
        if (previousState !== newState) {
            var newStateDescription = newState;
            if (newStateDescription === 'connected') {
                newStateDescription += ' with new socket ID ' + data.socket_id;
            }
            logger.debug('State changed', previousState + ' -> ' + newStateDescription);
            this.timeline.info({ state: newState, params: data });
            this.emit('state_change', { previous: previousState, current: newState });
            this.emit(newState, data);
        }
    };
    ConnectionManager.prototype.shouldRetry = function () {
        return this.state === 'connecting' || this.state === 'connected';
    };
    return ConnectionManager;
}(dispatcher));
/* harmony default export */ var connection_manager = (connection_manager_ConnectionManager);

// CONCATENATED MODULE: ./src/core/channels/channels.ts




var channels_Channels = (function () {
    function Channels() {
        this.channels = {};
    }
    Channels.prototype.add = function (name, pusher) {
        if (!this.channels[name]) {
            this.channels[name] = createChannel(name, pusher);
        }
        return this.channels[name];
    };
    Channels.prototype.all = function () {
        return values(this.channels);
    };
    Channels.prototype.find = function (name) {
        return this.channels[name];
    };
    Channels.prototype.remove = function (name) {
        var channel = this.channels[name];
        delete this.channels[name];
        return channel;
    };
    Channels.prototype.disconnect = function () {
        objectApply(this.channels, function (channel) {
            channel.disconnect();
        });
    };
    return Channels;
}());
/* harmony default export */ var channels = (channels_Channels);
function createChannel(name, pusher) {
    if (name.indexOf('private-encrypted-') === 0) {
        if (pusher.config.nacl) {
            return factory.createEncryptedChannel(name, pusher, pusher.config.nacl);
        }
        var errMsg = 'Tried to subscribe to a private-encrypted- channel but no nacl implementation available';
        var suffix = url_store.buildLogSuffix('encryptedChannelSupport');
        throw new UnsupportedFeature(errMsg + ". " + suffix);
    }
    else if (name.indexOf('private-') === 0) {
        return factory.createPrivateChannel(name, pusher);
    }
    else if (name.indexOf('presence-') === 0) {
        return factory.createPresenceChannel(name, pusher);
    }
    else {
        return factory.createChannel(name, pusher);
    }
}

// CONCATENATED MODULE: ./src/core/utils/factory.ts










var Factory = {
    createChannels: function () {
        return new channels();
    },
    createConnectionManager: function (key, options) {
        return new connection_manager(key, options);
    },
    createChannel: function (name, pusher) {
        return new channels_channel(name, pusher);
    },
    createPrivateChannel: function (name, pusher) {
        return new private_channel(name, pusher);
    },
    createPresenceChannel: function (name, pusher) {
        return new presence_channel(name, pusher);
    },
    createEncryptedChannel: function (name, pusher, nacl) {
        return new encrypted_channel(name, pusher, nacl);
    },
    createTimelineSender: function (timeline, options) {
        return new timeline_sender(timeline, options);
    },
    createAuthorizer: function (channel, options) {
        if (options.authorizer) {
            return options.authorizer(channel, options);
        }
        return new pusher_authorizer(channel, options);
    },
    createHandshake: function (transport, callback) {
        return new connection_handshake(transport, callback);
    },
    createAssistantToTheTransportManager: function (manager, transport, options) {
        return new assistant_to_the_transport_manager(manager, transport, options);
    }
};
/* harmony default export */ var factory = (Factory);

// CONCATENATED MODULE: ./src/core/transports/transport_manager.ts

var transport_manager_TransportManager = (function () {
    function TransportManager(options) {
        this.options = options || {};
        this.livesLeft = this.options.lives || Infinity;
    }
    TransportManager.prototype.getAssistant = function (transport) {
        return factory.createAssistantToTheTransportManager(this, transport, {
            minPingDelay: this.options.minPingDelay,
            maxPingDelay: this.options.maxPingDelay
        });
    };
    TransportManager.prototype.isAlive = function () {
        return this.livesLeft > 0;
    };
    TransportManager.prototype.reportDeath = function () {
        this.livesLeft -= 1;
    };
    return TransportManager;
}());
/* harmony default export */ var transport_manager = (transport_manager_TransportManager);

// CONCATENATED MODULE: ./src/core/strategies/sequential_strategy.ts



var sequential_strategy_SequentialStrategy = (function () {
    function SequentialStrategy(strategies, options) {
        this.strategies = strategies;
        this.loop = Boolean(options.loop);
        this.failFast = Boolean(options.failFast);
        this.timeout = options.timeout;
        this.timeoutLimit = options.timeoutLimit;
    }
    SequentialStrategy.prototype.isSupported = function () {
        return any(this.strategies, util.method('isSupported'));
    };
    SequentialStrategy.prototype.connect = function (minPriority, callback) {
        var _this = this;
        var strategies = this.strategies;
        var current = 0;
        var timeout = this.timeout;
        var runner = null;
        var tryNextStrategy = function (error, handshake) {
            if (handshake) {
                callback(null, handshake);
            }
            else {
                current = current + 1;
                if (_this.loop) {
                    current = current % strategies.length;
                }
                if (current < strategies.length) {
                    if (timeout) {
                        timeout = timeout * 2;
                        if (_this.timeoutLimit) {
                            timeout = Math.min(timeout, _this.timeoutLimit);
                        }
                    }
                    runner = _this.tryStrategy(strategies[current], minPriority, { timeout: timeout, failFast: _this.failFast }, tryNextStrategy);
                }
                else {
                    callback(true);
                }
            }
        };
        runner = this.tryStrategy(strategies[current], minPriority, { timeout: timeout, failFast: this.failFast }, tryNextStrategy);
        return {
            abort: function () {
                runner.abort();
            },
            forceMinPriority: function (p) {
                minPriority = p;
                if (runner) {
                    runner.forceMinPriority(p);
                }
            }
        };
    };
    SequentialStrategy.prototype.tryStrategy = function (strategy, minPriority, options, callback) {
        var timer = null;
        var runner = null;
        if (options.timeout > 0) {
            timer = new OneOffTimer(options.timeout, function () {
                runner.abort();
                callback(true);
            });
        }
        runner = strategy.connect(minPriority, function (error, handshake) {
            if (error && timer && timer.isRunning() && !options.failFast) {
                return;
            }
            if (timer) {
                timer.ensureAborted();
            }
            callback(error, handshake);
        });
        return {
            abort: function () {
                if (timer) {
                    timer.ensureAborted();
                }
                runner.abort();
            },
            forceMinPriority: function (p) {
                runner.forceMinPriority(p);
            }
        };
    };
    return SequentialStrategy;
}());
/* harmony default export */ var sequential_strategy = (sequential_strategy_SequentialStrategy);

// CONCATENATED MODULE: ./src/core/strategies/best_connected_ever_strategy.ts


var best_connected_ever_strategy_BestConnectedEverStrategy = (function () {
    function BestConnectedEverStrategy(strategies) {
        this.strategies = strategies;
    }
    BestConnectedEverStrategy.prototype.isSupported = function () {
        return any(this.strategies, util.method('isSupported'));
    };
    BestConnectedEverStrategy.prototype.connect = function (minPriority, callback) {
        return connect(this.strategies, minPriority, function (i, runners) {
            return function (error, handshake) {
                runners[i].error = error;
                if (error) {
                    if (allRunnersFailed(runners)) {
                        callback(true);
                    }
                    return;
                }
                apply(runners, function (runner) {
                    runner.forceMinPriority(handshake.transport.priority);
                });
                callback(null, handshake);
            };
        });
    };
    return BestConnectedEverStrategy;
}());
/* harmony default export */ var best_connected_ever_strategy = (best_connected_ever_strategy_BestConnectedEverStrategy);
function connect(strategies, minPriority, callbackBuilder) {
    var runners = map(strategies, function (strategy, i, _, rs) {
        return strategy.connect(minPriority, callbackBuilder(i, rs));
    });
    return {
        abort: function () {
            apply(runners, abortRunner);
        },
        forceMinPriority: function (p) {
            apply(runners, function (runner) {
                runner.forceMinPriority(p);
            });
        }
    };
}
function allRunnersFailed(runners) {
    return collections_all(runners, function (runner) {
        return Boolean(runner.error);
    });
}
function abortRunner(runner) {
    if (!runner.error && !runner.aborted) {
        runner.abort();
        runner.aborted = true;
    }
}

// CONCATENATED MODULE: ./src/core/strategies/cached_strategy.ts




var cached_strategy_CachedStrategy = (function () {
    function CachedStrategy(strategy, transports, options) {
        this.strategy = strategy;
        this.transports = transports;
        this.ttl = options.ttl || 1800 * 1000;
        this.usingTLS = options.useTLS;
        this.timeline = options.timeline;
    }
    CachedStrategy.prototype.isSupported = function () {
        return this.strategy.isSupported();
    };
    CachedStrategy.prototype.connect = function (minPriority, callback) {
        var usingTLS = this.usingTLS;
        var info = fetchTransportCache(usingTLS);
        var strategies = [this.strategy];
        if (info && info.timestamp + this.ttl >= util.now()) {
            var transport = this.transports[info.transport];
            if (transport) {
                this.timeline.info({
                    cached: true,
                    transport: info.transport,
                    latency: info.latency
                });
                strategies.push(new sequential_strategy([transport], {
                    timeout: info.latency * 2 + 1000,
                    failFast: true
                }));
            }
        }
        var startTimestamp = util.now();
        var runner = strategies
            .pop()
            .connect(minPriority, function cb(error, handshake) {
            if (error) {
                flushTransportCache(usingTLS);
                if (strategies.length > 0) {
                    startTimestamp = util.now();
                    runner = strategies.pop().connect(minPriority, cb);
                }
                else {
                    callback(error);
                }
            }
            else {
                storeTransportCache(usingTLS, handshake.transport.name, util.now() - startTimestamp);
                callback(null, handshake);
            }
        });
        return {
            abort: function () {
                runner.abort();
            },
            forceMinPriority: function (p) {
                minPriority = p;
                if (runner) {
                    runner.forceMinPriority(p);
                }
            }
        };
    };
    return CachedStrategy;
}());
/* harmony default export */ var cached_strategy = (cached_strategy_CachedStrategy);
function getTransportCacheKey(usingTLS) {
    return 'pusherTransport' + (usingTLS ? 'TLS' : 'NonTLS');
}
function fetchTransportCache(usingTLS) {
    var storage = runtime.getLocalStorage();
    if (storage) {
        try {
            var serializedCache = storage[getTransportCacheKey(usingTLS)];
            if (serializedCache) {
                return JSON.parse(serializedCache);
            }
        }
        catch (e) {
            flushTransportCache(usingTLS);
        }
    }
    return null;
}
function storeTransportCache(usingTLS, transport, latency) {
    var storage = runtime.getLocalStorage();
    if (storage) {
        try {
            storage[getTransportCacheKey(usingTLS)] = safeJSONStringify({
                timestamp: util.now(),
                transport: transport,
                latency: latency
            });
        }
        catch (e) {
        }
    }
}
function flushTransportCache(usingTLS) {
    var storage = runtime.getLocalStorage();
    if (storage) {
        try {
            delete storage[getTransportCacheKey(usingTLS)];
        }
        catch (e) {
        }
    }
}

// CONCATENATED MODULE: ./src/core/strategies/delayed_strategy.ts

var delayed_strategy_DelayedStrategy = (function () {
    function DelayedStrategy(strategy, _a) {
        var number = _a.delay;
        this.strategy = strategy;
        this.options = { delay: number };
    }
    DelayedStrategy.prototype.isSupported = function () {
        return this.strategy.isSupported();
    };
    DelayedStrategy.prototype.connect = function (minPriority, callback) {
        var strategy = this.strategy;
        var runner;
        var timer = new OneOffTimer(this.options.delay, function () {
            runner = strategy.connect(minPriority, callback);
        });
        return {
            abort: function () {
                timer.ensureAborted();
                if (runner) {
                    runner.abort();
                }
            },
            forceMinPriority: function (p) {
                minPriority = p;
                if (runner) {
                    runner.forceMinPriority(p);
                }
            }
        };
    };
    return DelayedStrategy;
}());
/* harmony default export */ var delayed_strategy = (delayed_strategy_DelayedStrategy);

// CONCATENATED MODULE: ./src/core/strategies/if_strategy.ts
var IfStrategy = (function () {
    function IfStrategy(test, trueBranch, falseBranch) {
        this.test = test;
        this.trueBranch = trueBranch;
        this.falseBranch = falseBranch;
    }
    IfStrategy.prototype.isSupported = function () {
        var branch = this.test() ? this.trueBranch : this.falseBranch;
        return branch.isSupported();
    };
    IfStrategy.prototype.connect = function (minPriority, callback) {
        var branch = this.test() ? this.trueBranch : this.falseBranch;
        return branch.connect(minPriority, callback);
    };
    return IfStrategy;
}());
/* harmony default export */ var if_strategy = (IfStrategy);

// CONCATENATED MODULE: ./src/core/strategies/first_connected_strategy.ts
var FirstConnectedStrategy = (function () {
    function FirstConnectedStrategy(strategy) {
        this.strategy = strategy;
    }
    FirstConnectedStrategy.prototype.isSupported = function () {
        return this.strategy.isSupported();
    };
    FirstConnectedStrategy.prototype.connect = function (minPriority, callback) {
        var runner = this.strategy.connect(minPriority, function (error, handshake) {
            if (handshake) {
                runner.abort();
            }
            callback(error, handshake);
        });
        return runner;
    };
    return FirstConnectedStrategy;
}());
/* harmony default export */ var first_connected_strategy = (FirstConnectedStrategy);

// CONCATENATED MODULE: ./src/runtimes/web/default_strategy.ts







function testSupportsStrategy(strategy) {
    return function () {
        return strategy.isSupported();
    };
}
var getDefaultStrategy = function (config, baseOptions, defineTransport) {
    var definedTransports = {};
    function defineTransportStrategy(name, type, priority, options, manager) {
        var transport = defineTransport(config, name, type, priority, options, manager);
        definedTransports[name] = transport;
        return transport;
    }
    var ws_options = Object.assign({}, baseOptions, {
        hostNonTLS: config.wsHost + ':' + config.wsPort,
        hostTLS: config.wsHost + ':' + config.wssPort,
        httpPath: config.wsPath
    });
    var wss_options = Object.assign({}, ws_options, {
        useTLS: true
    });
    var sockjs_options = Object.assign({}, baseOptions, {
        hostNonTLS: config.httpHost + ':' + config.httpPort,
        hostTLS: config.httpHost + ':' + config.httpsPort,
        httpPath: config.httpPath
    });
    var timeouts = {
        loop: true,
        timeout: 15000,
        timeoutLimit: 60000
    };
    var ws_manager = new transport_manager({
        lives: 2,
        minPingDelay: 10000,
        maxPingDelay: config.activityTimeout
    });
    var streaming_manager = new transport_manager({
        lives: 2,
        minPingDelay: 10000,
        maxPingDelay: config.activityTimeout
    });
    var ws_transport = defineTransportStrategy('ws', 'ws', 3, ws_options, ws_manager);
    var wss_transport = defineTransportStrategy('wss', 'ws', 3, wss_options, ws_manager);
    var sockjs_transport = defineTransportStrategy('sockjs', 'sockjs', 1, sockjs_options);
    var xhr_streaming_transport = defineTransportStrategy('xhr_streaming', 'xhr_streaming', 1, sockjs_options, streaming_manager);
    var xdr_streaming_transport = defineTransportStrategy('xdr_streaming', 'xdr_streaming', 1, sockjs_options, streaming_manager);
    var xhr_polling_transport = defineTransportStrategy('xhr_polling', 'xhr_polling', 1, sockjs_options);
    var xdr_polling_transport = defineTransportStrategy('xdr_polling', 'xdr_polling', 1, sockjs_options);
    var ws_loop = new sequential_strategy([ws_transport], timeouts);
    var wss_loop = new sequential_strategy([wss_transport], timeouts);
    var sockjs_loop = new sequential_strategy([sockjs_transport], timeouts);
    var streaming_loop = new sequential_strategy([
        new if_strategy(testSupportsStrategy(xhr_streaming_transport), xhr_streaming_transport, xdr_streaming_transport)
    ], timeouts);
    var polling_loop = new sequential_strategy([
        new if_strategy(testSupportsStrategy(xhr_polling_transport), xhr_polling_transport, xdr_polling_transport)
    ], timeouts);
    var http_loop = new sequential_strategy([
        new if_strategy(testSupportsStrategy(streaming_loop), new best_connected_ever_strategy([
            streaming_loop,
            new delayed_strategy(polling_loop, { delay: 4000 })
        ]), polling_loop)
    ], timeouts);
    var http_fallback_loop = new if_strategy(testSupportsStrategy(http_loop), http_loop, sockjs_loop);
    var wsStrategy;
    if (baseOptions.useTLS) {
        wsStrategy = new best_connected_ever_strategy([
            ws_loop,
            new delayed_strategy(http_fallback_loop, { delay: 2000 })
        ]);
    }
    else {
        wsStrategy = new best_connected_ever_strategy([
            ws_loop,
            new delayed_strategy(wss_loop, { delay: 2000 }),
            new delayed_strategy(http_fallback_loop, { delay: 5000 })
        ]);
    }
    return new cached_strategy(new first_connected_strategy(new if_strategy(testSupportsStrategy(ws_transport), wsStrategy, http_fallback_loop)), definedTransports, {
        ttl: 1800000,
        timeline: baseOptions.timeline,
        useTLS: baseOptions.useTLS
    });
};
/* harmony default export */ var default_strategy = (getDefaultStrategy);

// CONCATENATED MODULE: ./src/runtimes/web/transports/transport_connection_initializer.ts

/* harmony default export */ var transport_connection_initializer = (function () {
    var self = this;
    self.timeline.info(self.buildTimelineMessage({
        transport: self.name + (self.options.useTLS ? 's' : '')
    }));
    if (self.hooks.isInitialized()) {
        self.changeState('initialized');
    }
    else if (self.hooks.file) {
        self.changeState('initializing');
        Dependencies.load(self.hooks.file, { useTLS: self.options.useTLS }, function (error, callback) {
            if (self.hooks.isInitialized()) {
                self.changeState('initialized');
                callback(true);
            }
            else {
                if (error) {
                    self.onError(error);
                }
                self.onClose();
                callback(false);
            }
        });
    }
    else {
        self.onClose();
    }
});

// CONCATENATED MODULE: ./src/runtimes/web/http/http_xdomain_request.ts

var http_xdomain_request_hooks = {
    getRequest: function (socket) {
        var xdr = new window.XDomainRequest();
        xdr.ontimeout = function () {
            socket.emit('error', new RequestTimedOut());
            socket.close();
        };
        xdr.onerror = function (e) {
            socket.emit('error', e);
            socket.close();
        };
        xdr.onprogress = function () {
            if (xdr.responseText && xdr.responseText.length > 0) {
                socket.onChunk(200, xdr.responseText);
            }
        };
        xdr.onload = function () {
            if (xdr.responseText && xdr.responseText.length > 0) {
                socket.onChunk(200, xdr.responseText);
            }
            socket.emit('finished', 200);
            socket.close();
        };
        return xdr;
    },
    abortRequest: function (xdr) {
        xdr.ontimeout = xdr.onerror = xdr.onprogress = xdr.onload = null;
        xdr.abort();
    }
};
/* harmony default export */ var http_xdomain_request = (http_xdomain_request_hooks);

// CONCATENATED MODULE: ./src/core/http/http_request.ts
var http_request_extends = (undefined && undefined.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();


var MAX_BUFFER_LENGTH = 256 * 1024;
var http_request_HTTPRequest = (function (_super) {
    http_request_extends(HTTPRequest, _super);
    function HTTPRequest(hooks, method, url) {
        var _this = _super.call(this) || this;
        _this.hooks = hooks;
        _this.method = method;
        _this.url = url;
        return _this;
    }
    HTTPRequest.prototype.start = function (payload) {
        var _this = this;
        this.position = 0;
        this.xhr = this.hooks.getRequest(this);
        this.unloader = function () {
            _this.close();
        };
        runtime.addUnloadListener(this.unloader);
        this.xhr.open(this.method, this.url, true);
        if (this.xhr.setRequestHeader) {
            this.xhr.setRequestHeader('Content-Type', 'application/json');
        }
        this.xhr.send(payload);
    };
    HTTPRequest.prototype.close = function () {
        if (this.unloader) {
            runtime.removeUnloadListener(this.unloader);
            this.unloader = null;
        }
        if (this.xhr) {
            this.hooks.abortRequest(this.xhr);
            this.xhr = null;
        }
    };
    HTTPRequest.prototype.onChunk = function (status, data) {
        while (true) {
            var chunk = this.advanceBuffer(data);
            if (chunk) {
                this.emit('chunk', { status: status, data: chunk });
            }
            else {
                break;
            }
        }
        if (this.isBufferTooLong(data)) {
            this.emit('buffer_too_long');
        }
    };
    HTTPRequest.prototype.advanceBuffer = function (buffer) {
        var unreadData = buffer.slice(this.position);
        var endOfLinePosition = unreadData.indexOf('\n');
        if (endOfLinePosition !== -1) {
            this.position += endOfLinePosition + 1;
            return unreadData.slice(0, endOfLinePosition);
        }
        else {
            return null;
        }
    };
    HTTPRequest.prototype.isBufferTooLong = function (buffer) {
        return this.position === buffer.length && buffer.length > MAX_BUFFER_LENGTH;
    };
    return HTTPRequest;
}(dispatcher));
/* harmony default export */ var http_request = (http_request_HTTPRequest);

// CONCATENATED MODULE: ./src/core/http/state.ts
var State;
(function (State) {
    State[State["CONNECTING"] = 0] = "CONNECTING";
    State[State["OPEN"] = 1] = "OPEN";
    State[State["CLOSED"] = 3] = "CLOSED";
})(State || (State = {}));
/* harmony default export */ var state = (State);

// CONCATENATED MODULE: ./src/core/http/http_socket.ts



var autoIncrement = 1;
var http_socket_HTTPSocket = (function () {
    function HTTPSocket(hooks, url) {
        this.hooks = hooks;
        this.session = randomNumber(1000) + '/' + randomString(8);
        this.location = getLocation(url);
        this.readyState = state.CONNECTING;
        this.openStream();
    }
    HTTPSocket.prototype.send = function (payload) {
        return this.sendRaw(JSON.stringify([payload]));
    };
    HTTPSocket.prototype.ping = function () {
        this.hooks.sendHeartbeat(this);
    };
    HTTPSocket.prototype.close = function (code, reason) {
        this.onClose(code, reason, true);
    };
    HTTPSocket.prototype.sendRaw = function (payload) {
        if (this.readyState === state.OPEN) {
            try {
                runtime.createSocketRequest('POST', getUniqueURL(getSendURL(this.location, this.session))).start(payload);
                return true;
            }
            catch (e) {
                return false;
            }
        }
        else {
            return false;
        }
    };
    HTTPSocket.prototype.reconnect = function () {
        this.closeStream();
        this.openStream();
    };
    HTTPSocket.prototype.onClose = function (code, reason, wasClean) {
        this.closeStream();
        this.readyState = state.CLOSED;
        if (this.onclose) {
            this.onclose({
                code: code,
                reason: reason,
                wasClean: wasClean
            });
        }
    };
    HTTPSocket.prototype.onChunk = function (chunk) {
        if (chunk.status !== 200) {
            return;
        }
        if (this.readyState === state.OPEN) {
            this.onActivity();
        }
        var payload;
        var type = chunk.data.slice(0, 1);
        switch (type) {
            case 'o':
                payload = JSON.parse(chunk.data.slice(1) || '{}');
                this.onOpen(payload);
                break;
            case 'a':
                payload = JSON.parse(chunk.data.slice(1) || '[]');
                for (var i = 0; i < payload.length; i++) {
                    this.onEvent(payload[i]);
                }
                break;
            case 'm':
                payload = JSON.parse(chunk.data.slice(1) || 'null');
                this.onEvent(payload);
                break;
            case 'h':
                this.hooks.onHeartbeat(this);
                break;
            case 'c':
                payload = JSON.parse(chunk.data.slice(1) || '[]');
                this.onClose(payload[0], payload[1], true);
                break;
        }
    };
    HTTPSocket.prototype.onOpen = function (options) {
        if (this.readyState === state.CONNECTING) {
            if (options && options.hostname) {
                this.location.base = replaceHost(this.location.base, options.hostname);
            }
            this.readyState = state.OPEN;
            if (this.onopen) {
                this.onopen();
            }
        }
        else {
            this.onClose(1006, 'Server lost session', true);
        }
    };
    HTTPSocket.prototype.onEvent = function (event) {
        if (this.readyState === state.OPEN && this.onmessage) {
            this.onmessage({ data: event });
        }
    };
    HTTPSocket.prototype.onActivity = function () {
        if (this.onactivity) {
            this.onactivity();
        }
    };
    HTTPSocket.prototype.onError = function (error) {
        if (this.onerror) {
            this.onerror(error);
        }
    };
    HTTPSocket.prototype.openStream = function () {
        var _this = this;
        this.stream = runtime.createSocketRequest('POST', getUniqueURL(this.hooks.getReceiveURL(this.location, this.session)));
        this.stream.bind('chunk', function (chunk) {
            _this.onChunk(chunk);
        });
        this.stream.bind('finished', function (status) {
            _this.hooks.onFinished(_this, status);
        });
        this.stream.bind('buffer_too_long', function () {
            _this.reconnect();
        });
        try {
            this.stream.start();
        }
        catch (error) {
            util.defer(function () {
                _this.onError(error);
                _this.onClose(1006, 'Could not start streaming', false);
            });
        }
    };
    HTTPSocket.prototype.closeStream = function () {
        if (this.stream) {
            this.stream.unbind_all();
            this.stream.close();
            this.stream = null;
        }
    };
    return HTTPSocket;
}());
function getLocation(url) {
    var parts = /([^\?]*)\/*(\??.*)/.exec(url);
    return {
        base: parts[1],
        queryString: parts[2]
    };
}
function getSendURL(url, session) {
    return url.base + '/' + session + '/xhr_send';
}
function getUniqueURL(url) {
    var separator = url.indexOf('?') === -1 ? '?' : '&';
    return url + separator + 't=' + +new Date() + '&n=' + autoIncrement++;
}
function replaceHost(url, hostname) {
    var urlParts = /(https?:\/\/)([^\/:]+)((\/|:)?.*)/.exec(url);
    return urlParts[1] + hostname + urlParts[3];
}
function randomNumber(max) {
    return Math.floor(Math.random() * max);
}
function randomString(length) {
    var result = [];
    for (var i = 0; i < length; i++) {
        result.push(randomNumber(32).toString(32));
    }
    return result.join('');
}
/* harmony default export */ var http_socket = (http_socket_HTTPSocket);

// CONCATENATED MODULE: ./src/core/http/http_streaming_socket.ts
var http_streaming_socket_hooks = {
    getReceiveURL: function (url, session) {
        return url.base + '/' + session + '/xhr_streaming' + url.queryString;
    },
    onHeartbeat: function (socket) {
        socket.sendRaw('[]');
    },
    sendHeartbeat: function (socket) {
        socket.sendRaw('[]');
    },
    onFinished: function (socket, status) {
        socket.onClose(1006, 'Connection interrupted (' + status + ')', false);
    }
};
/* harmony default export */ var http_streaming_socket = (http_streaming_socket_hooks);

// CONCATENATED MODULE: ./src/core/http/http_polling_socket.ts
var http_polling_socket_hooks = {
    getReceiveURL: function (url, session) {
        return url.base + '/' + session + '/xhr' + url.queryString;
    },
    onHeartbeat: function () {
    },
    sendHeartbeat: function (socket) {
        socket.sendRaw('[]');
    },
    onFinished: function (socket, status) {
        if (status === 200) {
            socket.reconnect();
        }
        else {
            socket.onClose(1006, 'Connection interrupted (' + status + ')', false);
        }
    }
};
/* harmony default export */ var http_polling_socket = (http_polling_socket_hooks);

// CONCATENATED MODULE: ./src/runtimes/isomorphic/http/http_xhr_request.ts

var http_xhr_request_hooks = {
    getRequest: function (socket) {
        var Constructor = runtime.getXHRAPI();
        var xhr = new Constructor();
        xhr.onreadystatechange = xhr.onprogress = function () {
            switch (xhr.readyState) {
                case 3:
                    if (xhr.responseText && xhr.responseText.length > 0) {
                        socket.onChunk(xhr.status, xhr.responseText);
                    }
                    break;
                case 4:
                    if (xhr.responseText && xhr.responseText.length > 0) {
                        socket.onChunk(xhr.status, xhr.responseText);
                    }
                    socket.emit('finished', xhr.status);
                    socket.close();
                    break;
            }
        };
        return xhr;
    },
    abortRequest: function (xhr) {
        xhr.onreadystatechange = null;
        xhr.abort();
    }
};
/* harmony default export */ var http_xhr_request = (http_xhr_request_hooks);

// CONCATENATED MODULE: ./src/runtimes/isomorphic/http/http.ts





var HTTP = {
    createStreamingSocket: function (url) {
        return this.createSocket(http_streaming_socket, url);
    },
    createPollingSocket: function (url) {
        return this.createSocket(http_polling_socket, url);
    },
    createSocket: function (hooks, url) {
        return new http_socket(hooks, url);
    },
    createXHR: function (method, url) {
        return this.createRequest(http_xhr_request, method, url);
    },
    createRequest: function (hooks, method, url) {
        return new http_request(hooks, method, url);
    }
};
/* harmony default export */ var http_http = (HTTP);

// CONCATENATED MODULE: ./src/runtimes/web/http/http.ts


http_http.createXDR = function (method, url) {
    return this.createRequest(http_xdomain_request, method, url);
};
/* harmony default export */ var web_http_http = (http_http);

// CONCATENATED MODULE: ./src/runtimes/web/runtime.ts












var Runtime = {
    nextAuthCallbackID: 1,
    auth_callbacks: {},
    ScriptReceivers: ScriptReceivers,
    DependenciesReceivers: DependenciesReceivers,
    getDefaultStrategy: default_strategy,
    Transports: transports_transports,
    transportConnectionInitializer: transport_connection_initializer,
    HTTPFactory: web_http_http,
    TimelineTransport: jsonp_timeline,
    getXHRAPI: function () {
        return window.XMLHttpRequest;
    },
    getWebSocketAPI: function () {
        return window.WebSocket || window.MozWebSocket;
    },
    setup: function (PusherClass) {
        var _this = this;
        window.Pusher = PusherClass;
        var initializeOnDocumentBody = function () {
            _this.onDocumentBody(PusherClass.ready);
        };
        if (!window.JSON) {
            Dependencies.load('json2', {}, initializeOnDocumentBody);
        }
        else {
            initializeOnDocumentBody();
        }
    },
    getDocument: function () {
        return document;
    },
    getProtocol: function () {
        return this.getDocument().location.protocol;
    },
    getAuthorizers: function () {
        return { ajax: xhr_auth, jsonp: jsonp_auth };
    },
    onDocumentBody: function (callback) {
        var _this = this;
        if (document.body) {
            callback();
        }
        else {
            setTimeout(function () {
                _this.onDocumentBody(callback);
            }, 0);
        }
    },
    createJSONPRequest: function (url, data) {
        return new jsonp_request(url, data);
    },
    createScriptRequest: function (src) {
        return new script_request(src);
    },
    getLocalStorage: function () {
        try {
            return window.localStorage;
        }
        catch (e) {
            return undefined;
        }
    },
    createXHR: function () {
        if (this.getXHRAPI()) {
            return this.createXMLHttpRequest();
        }
        else {
            return this.createMicrosoftXHR();
        }
    },
    createXMLHttpRequest: function () {
        var Constructor = this.getXHRAPI();
        return new Constructor();
    },
    createMicrosoftXHR: function () {
        return new ActiveXObject('Microsoft.XMLHTTP');
    },
    getNetwork: function () {
        return net_info_Network;
    },
    createWebSocket: function (url) {
        var Constructor = this.getWebSocketAPI();
        return new Constructor(url);
    },
    createSocketRequest: function (method, url) {
        if (this.isXHRSupported()) {
            return this.HTTPFactory.createXHR(method, url);
        }
        else if (this.isXDRSupported(url.indexOf('https:') === 0)) {
            return this.HTTPFactory.createXDR(method, url);
        }
        else {
            throw 'Cross-origin HTTP requests are not supported';
        }
    },
    isXHRSupported: function () {
        var Constructor = this.getXHRAPI();
        return (Boolean(Constructor) && new Constructor().withCredentials !== undefined);
    },
    isXDRSupported: function (useTLS) {
        var protocol = useTLS ? 'https:' : 'http:';
        var documentProtocol = this.getProtocol();
        return (Boolean(window['XDomainRequest']) && documentProtocol === protocol);
    },
    addUnloadListener: function (listener) {
        if (window.addEventListener !== undefined) {
            window.addEventListener('unload', listener, false);
        }
        else if (window.attachEvent !== undefined) {
            window.attachEvent('onunload', listener);
        }
    },
    removeUnloadListener: function (listener) {
        if (window.addEventListener !== undefined) {
            window.removeEventListener('unload', listener, false);
        }
        else if (window.detachEvent !== undefined) {
            window.detachEvent('onunload', listener);
        }
    }
};
/* harmony default export */ var runtime = (Runtime);

// CONCATENATED MODULE: ./src/core/timeline/level.ts
var TimelineLevel;
(function (TimelineLevel) {
    TimelineLevel[TimelineLevel["ERROR"] = 3] = "ERROR";
    TimelineLevel[TimelineLevel["INFO"] = 6] = "INFO";
    TimelineLevel[TimelineLevel["DEBUG"] = 7] = "DEBUG";
})(TimelineLevel || (TimelineLevel = {}));
/* harmony default export */ var timeline_level = (TimelineLevel);

// CONCATENATED MODULE: ./src/core/timeline/timeline.ts



var timeline_Timeline = (function () {
    function Timeline(key, session, options) {
        this.key = key;
        this.session = session;
        this.events = [];
        this.options = options || {};
        this.sent = 0;
        this.uniqueID = 0;
    }
    Timeline.prototype.log = function (level, event) {
        if (level <= this.options.level) {
            this.events.push(extend({}, event, { timestamp: util.now() }));
            if (this.options.limit && this.events.length > this.options.limit) {
                this.events.shift();
            }
        }
    };
    Timeline.prototype.error = function (event) {
        this.log(timeline_level.ERROR, event);
    };
    Timeline.prototype.info = function (event) {
        this.log(timeline_level.INFO, event);
    };
    Timeline.prototype.debug = function (event) {
        this.log(timeline_level.DEBUG, event);
    };
    Timeline.prototype.isEmpty = function () {
        return this.events.length === 0;
    };
    Timeline.prototype.send = function (sendfn, callback) {
        var _this = this;
        var data = extend({
            session: this.session,
            bundle: this.sent + 1,
            key: this.key,
            lib: 'js',
            version: this.options.version,
            cluster: this.options.cluster,
            features: this.options.features,
            timeline: this.events
        }, this.options.params);
        this.events = [];
        sendfn(data, function (error, result) {
            if (!error) {
                _this.sent++;
            }
            if (callback) {
                callback(error, result);
            }
        });
        return true;
    };
    Timeline.prototype.generateUniqueID = function () {
        this.uniqueID++;
        return this.uniqueID;
    };
    return Timeline;
}());
/* harmony default export */ var timeline_timeline = (timeline_Timeline);

// CONCATENATED MODULE: ./src/core/strategies/transport_strategy.ts




var transport_strategy_TransportStrategy = (function () {
    function TransportStrategy(name, priority, transport, options) {
        this.name = name;
        this.priority = priority;
        this.transport = transport;
        this.options = options || {};
    }
    TransportStrategy.prototype.isSupported = function () {
        return this.transport.isSupported({
            useTLS: this.options.useTLS
        });
    };
    TransportStrategy.prototype.connect = function (minPriority, callback) {
        var _this = this;
        if (!this.isSupported()) {
            return failAttempt(new UnsupportedStrategy(), callback);
        }
        else if (this.priority < minPriority) {
            return failAttempt(new TransportPriorityTooLow(), callback);
        }
        var connected = false;
        var transport = this.transport.createConnection(this.name, this.priority, this.options.key, this.options);
        var handshake = null;
        var onInitialized = function () {
            transport.unbind('initialized', onInitialized);
            transport.connect();
        };
        var onOpen = function () {
            handshake = factory.createHandshake(transport, function (result) {
                connected = true;
                unbindListeners();
                callback(null, result);
            });
        };
        var onError = function (error) {
            unbindListeners();
            callback(error);
        };
        var onClosed = function () {
            unbindListeners();
            var serializedTransport;
            serializedTransport = safeJSONStringify(transport);
            callback(new TransportClosed(serializedTransport));
        };
        var unbindListeners = function () {
            transport.unbind('initialized', onInitialized);
            transport.unbind('open', onOpen);
            transport.unbind('error', onError);
            transport.unbind('closed', onClosed);
        };
        transport.bind('initialized', onInitialized);
        transport.bind('open', onOpen);
        transport.bind('error', onError);
        transport.bind('closed', onClosed);
        transport.initialize();
        return {
            abort: function () {
                if (connected) {
                    return;
                }
                unbindListeners();
                if (handshake) {
                    handshake.close();
                }
                else {
                    transport.close();
                }
            },
            forceMinPriority: function (p) {
                if (connected) {
                    return;
                }
                if (_this.priority < p) {
                    if (handshake) {
                        handshake.close();
                    }
                    else {
                        transport.close();
                    }
                }
            }
        };
    };
    return TransportStrategy;
}());
/* harmony default export */ var transport_strategy = (transport_strategy_TransportStrategy);
function failAttempt(error, callback) {
    util.defer(function () {
        callback(error);
    });
    return {
        abort: function () { },
        forceMinPriority: function () { }
    };
}

// CONCATENATED MODULE: ./src/core/strategies/strategy_builder.ts





var strategy_builder_Transports = runtime.Transports;
var strategy_builder_defineTransport = function (config, name, type, priority, options, manager) {
    var transportClass = strategy_builder_Transports[type];
    if (!transportClass) {
        throw new UnsupportedTransport(type);
    }
    var enabled = (!config.enabledTransports ||
        arrayIndexOf(config.enabledTransports, name) !== -1) &&
        (!config.disabledTransports ||
            arrayIndexOf(config.disabledTransports, name) === -1);
    var transport;
    if (enabled) {
        options = Object.assign({ ignoreNullOrigin: config.ignoreNullOrigin }, options);
        transport = new transport_strategy(name, priority, manager ? manager.getAssistant(transportClass) : transportClass, options);
    }
    else {
        transport = strategy_builder_UnsupportedStrategy;
    }
    return transport;
};
var strategy_builder_UnsupportedStrategy = {
    isSupported: function () {
        return false;
    },
    connect: function (_, callback) {
        var deferred = util.defer(function () {
            callback(new UnsupportedStrategy());
        });
        return {
            abort: function () {
                deferred.ensureAborted();
            },
            forceMinPriority: function () { }
        };
    }
};

// CONCATENATED MODULE: ./src/core/config.ts


function getConfig(opts) {
    var config = {
        activityTimeout: opts.activityTimeout || defaults.activityTimeout,
        authEndpoint: opts.authEndpoint || defaults.authEndpoint,
        authTransport: opts.authTransport || defaults.authTransport,
        cluster: opts.cluster || defaults.cluster,
        httpPath: opts.httpPath || defaults.httpPath,
        httpPort: opts.httpPort || defaults.httpPort,
        httpsPort: opts.httpsPort || defaults.httpsPort,
        pongTimeout: opts.pongTimeout || defaults.pongTimeout,
        statsHost: opts.statsHost || defaults.stats_host,
        unavailableTimeout: opts.unavailableTimeout || defaults.unavailableTimeout,
        wsPath: opts.wsPath || defaults.wsPath,
        wsPort: opts.wsPort || defaults.wsPort,
        wssPort: opts.wssPort || defaults.wssPort,
        enableStats: getEnableStatsConfig(opts),
        httpHost: getHttpHost(opts),
        useTLS: shouldUseTLS(opts),
        wsHost: getWebsocketHost(opts)
    };
    if ('auth' in opts)
        config.auth = opts.auth;
    if ('authorizer' in opts)
        config.authorizer = opts.authorizer;
    if ('disabledTransports' in opts)
        config.disabledTransports = opts.disabledTransports;
    if ('enabledTransports' in opts)
        config.enabledTransports = opts.enabledTransports;
    if ('ignoreNullOrigin' in opts)
        config.ignoreNullOrigin = opts.ignoreNullOrigin;
    if ('timelineParams' in opts)
        config.timelineParams = opts.timelineParams;
    if ('nacl' in opts) {
        config.nacl = opts.nacl;
    }
    return config;
}
function getHttpHost(opts) {
    if (opts.httpHost) {
        return opts.httpHost;
    }
    if (opts.cluster) {
        return "sockjs-" + opts.cluster + ".pusher.com";
    }
    return defaults.httpHost;
}
function getWebsocketHost(opts) {
    if (opts.wsHost) {
        return opts.wsHost;
    }
    if (opts.cluster) {
        return getWebsocketHostFromCluster(opts.cluster);
    }
    return getWebsocketHostFromCluster(defaults.cluster);
}
function getWebsocketHostFromCluster(cluster) {
    return "ws-" + cluster + ".pusher.com";
}
function shouldUseTLS(opts) {
    if (runtime.getProtocol() === 'https:') {
        return true;
    }
    else if (opts.forceTLS === false) {
        return false;
    }
    return true;
}
function getEnableStatsConfig(opts) {
    if ('enableStats' in opts) {
        return opts.enableStats;
    }
    if ('disableStats' in opts) {
        return !opts.disableStats;
    }
    return false;
}

// CONCATENATED MODULE: ./src/core/pusher.ts












var pusher_Pusher = (function () {
    function Pusher(app_key, options) {
        var _this = this;
        checkAppKey(app_key);
        options = options || {};
        if (!options.cluster && !(options.wsHost || options.httpHost)) {
            var suffix = url_store.buildLogSuffix('javascriptQuickStart');
            logger.warn("You should always specify a cluster when connecting. " + suffix);
        }
        if ('disableStats' in options) {
            logger.warn('The disableStats option is deprecated in favor of enableStats');
        }
        this.key = app_key;
        this.config = getConfig(options);
        this.channels = factory.createChannels();
        this.global_emitter = new dispatcher();
        this.sessionID = Math.floor(Math.random() * 1000000000);
        this.timeline = new timeline_timeline(this.key, this.sessionID, {
            cluster: this.config.cluster,
            features: Pusher.getClientFeatures(),
            params: this.config.timelineParams || {},
            limit: 50,
            level: timeline_level.INFO,
            version: defaults.VERSION
        });
        if (this.config.enableStats) {
            this.timelineSender = factory.createTimelineSender(this.timeline, {
                host: this.config.statsHost,
                path: '/timeline/v2/' + runtime.TimelineTransport.name
            });
        }
        var getStrategy = function (options) {
            return runtime.getDefaultStrategy(_this.config, options, strategy_builder_defineTransport);
        };
        this.connection = factory.createConnectionManager(this.key, {
            getStrategy: getStrategy,
            timeline: this.timeline,
            activityTimeout: this.config.activityTimeout,
            pongTimeout: this.config.pongTimeout,
            unavailableTimeout: this.config.unavailableTimeout,
            useTLS: Boolean(this.config.useTLS)
        });
        this.connection.bind('connected', function () {
            _this.subscribeAll();
            if (_this.timelineSender) {
                _this.timelineSender.send(_this.connection.isUsingTLS());
            }
        });
        this.connection.bind('message', function (event) {
            var eventName = event.event;
            var internal = eventName.indexOf('pusher_internal:') === 0;
            if (event.channel) {
                var channel = _this.channel(event.channel);
                if (channel) {
                    channel.handleEvent(event);
                }
            }
            if (!internal) {
                _this.global_emitter.emit(event.event, event.data);
            }
        });
        this.connection.bind('connecting', function () {
            _this.channels.disconnect();
        });
        this.connection.bind('disconnected', function () {
            _this.channels.disconnect();
        });
        this.connection.bind('error', function (err) {
            logger.warn(err);
        });
        Pusher.instances.push(this);
        this.timeline.info({ instances: Pusher.instances.length });
        if (Pusher.isReady) {
            this.connect();
        }
    }
    Pusher.ready = function () {
        Pusher.isReady = true;
        for (var i = 0, l = Pusher.instances.length; i < l; i++) {
            Pusher.instances[i].connect();
        }
    };
    Pusher.getClientFeatures = function () {
        return keys(filterObject({ ws: runtime.Transports.ws }, function (t) {
            return t.isSupported({});
        }));
    };
    Pusher.prototype.channel = function (name) {
        return this.channels.find(name);
    };
    Pusher.prototype.allChannels = function () {
        return this.channels.all();
    };
    Pusher.prototype.connect = function () {
        this.connection.connect();
        if (this.timelineSender) {
            if (!this.timelineSenderTimer) {
                var usingTLS = this.connection.isUsingTLS();
                var timelineSender = this.timelineSender;
                this.timelineSenderTimer = new PeriodicTimer(60000, function () {
                    timelineSender.send(usingTLS);
                });
            }
        }
    };
    Pusher.prototype.disconnect = function () {
        this.connection.disconnect();
        if (this.timelineSenderTimer) {
            this.timelineSenderTimer.ensureAborted();
            this.timelineSenderTimer = null;
        }
    };
    Pusher.prototype.bind = function (event_name, callback, context) {
        this.global_emitter.bind(event_name, callback, context);
        return this;
    };
    Pusher.prototype.unbind = function (event_name, callback, context) {
        this.global_emitter.unbind(event_name, callback, context);
        return this;
    };
    Pusher.prototype.bind_global = function (callback) {
        this.global_emitter.bind_global(callback);
        return this;
    };
    Pusher.prototype.unbind_global = function (callback) {
        this.global_emitter.unbind_global(callback);
        return this;
    };
    Pusher.prototype.unbind_all = function (callback) {
        this.global_emitter.unbind_all();
        return this;
    };
    Pusher.prototype.subscribeAll = function () {
        var channelName;
        for (channelName in this.channels.channels) {
            if (this.channels.channels.hasOwnProperty(channelName)) {
                this.subscribe(channelName);
            }
        }
    };
    Pusher.prototype.subscribe = function (channel_name) {
        var channel = this.channels.add(channel_name, this);
        if (channel.subscriptionPending && channel.subscriptionCancelled) {
            channel.reinstateSubscription();
        }
        else if (!channel.subscriptionPending &&
            this.connection.state === 'connected') {
            channel.subscribe();
        }
        return channel;
    };
    Pusher.prototype.unsubscribe = function (channel_name) {
        var channel = this.channels.find(channel_name);
        if (channel && channel.subscriptionPending) {
            channel.cancelSubscription();
        }
        else {
            channel = this.channels.remove(channel_name);
            if (channel && channel.subscribed) {
                channel.unsubscribe();
            }
        }
    };
    Pusher.prototype.send_event = function (event_name, data, channel) {
        return this.connection.send_event(event_name, data, channel);
    };
    Pusher.prototype.shouldUseTLS = function () {
        return this.config.useTLS;
    };
    Pusher.instances = [];
    Pusher.isReady = false;
    Pusher.logToConsole = false;
    Pusher.Runtime = runtime;
    Pusher.ScriptReceivers = runtime.ScriptReceivers;
    Pusher.DependenciesReceivers = runtime.DependenciesReceivers;
    Pusher.auth_callbacks = runtime.auth_callbacks;
    return Pusher;
}());
/* harmony default export */ var core_pusher = __webpack_exports__["default"] = (pusher_Pusher);
function checkAppKey(key) {
    if (key === null || key === undefined) {
        throw 'You must pass your app key when you instantiate Pusher.';
    }
}
runtime.setup(pusher_Pusher);


/***/ })
/******/ ]);
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["/js/vendor"], () => (__webpack_exec__("./resources/js/bootstrap.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLFFBQVE7QUFDUjtBQUNBLFFBQVE7QUFDUjtBQUNBOztBQUVBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQzs7QUFFRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBLENBQUM7O0FBRUQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxRQUFRO0FBQ1I7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQSxRQUFRO0FBQ1I7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLFFBQVE7QUFDUjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQzs7QUFFRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBLENBQUM7O0FBRUQ7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1QsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQzs7QUFFRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNULE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBLENBQUM7O0FBRUQ7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsbUNBQW1DOztBQUVuQztBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0EscUNBQXFDOztBQUVyQztBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsUUFBUTtBQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNULE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0EsaUNBQWlDOztBQUVqQztBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBLG1DQUFtQzs7QUFFbkM7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBLDBDQUEwQzs7QUFFMUM7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQSxrQ0FBa0M7QUFDbEM7QUFDQSxHQUFHOztBQUVIO0FBQ0EsQ0FBQzs7QUFFRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsUUFBUTtBQUNSO0FBQ0EsUUFBUTtBQUNSO0FBQ0EsUUFBUTtBQUNSO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVELGlFQUFlLElBQUksRUFBQzs7Ozs7Ozs7Ozs7QUNoaURwQjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxVQUFVO0FBQ1Y7QUFDQTtBQUNBLE1BQU07QUFDTjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsVUFBVTtBQUNWO0FBQ0E7QUFDQSxNQUFNO0FBQ047QUFDQTtBQUNBLEVBQUU7QUFDRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7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O0FBQ0EsNENBQTRDO0FBQzVDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxlQUFlLHFCQUFxQjtBQUNwQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsZUFBZSxnQkFBZ0I7QUFDL0I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBbUM7QUFDbkM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsdUNBQXVDLFFBQVE7QUFDL0M7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxPQUFPO0FBQ1A7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0EsK0NBQStDLGFBQWE7QUFDNUQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esb0JBQW9CLGNBQWM7QUFDbEM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGlCQUFpQjtBQUNqQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxvQkFBb0IsY0FBYztBQUNsQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsaUJBQWlCO0FBQ2pCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLG9CQUFvQixnQkFBZ0I7QUFDcEM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsT0FBTztBQUNQO0FBQ0EsaUNBQWlDLGdDQUFtQjs7QUFFcEQ7QUFDQSxpQkFBaUIsZ0NBQW1COzs7QUFHcEMsT0FBTztBQUNQO0FBQ0EsNkNBQTZDLGdDQUFtQjs7QUFFaEU7QUFDQSxnQ0FBbUI7O0FBRW5CO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxpQkFBaUI7QUFDakI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7O0FBRUQ7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esb0NBQW9DLHNCQUFzQjtBQUMxRDtBQUNB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QTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLDZFQUE2RTtBQUM3RTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxtRkFBbUYsd0JBQXdCO0FBQzNHO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSx3QkFBd0Isa0NBQWtDO0FBQzFEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSw0QkFBNEIsc0JBQXNCO0FBQ2xEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGVBQWUsZ0JBQWdCLHNDQUFzQyxrQkFBa0I7QUFDdkYsOEJBQThCO0FBQzlCO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esd0JBQXdCO0FBQ3hCO0FBQ0E7QUFDQSxDQUFDOzs7Ozs7QUFNRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0E7QUFDQTtBQUNBLHFDQUFxQyxnQ0FBZ0M7QUFDckU7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSw2QkFBNkIsc0NBQXNDO0FBQ25FLHdEQUF3RCx5QkFBeUI7QUFDakY7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0Esd0JBQXdCLGNBQWM7QUFDdEM7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBOzs7OztBQUtBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLCtEQUErRDtBQUMvRCw0REFBNEQ7QUFDNUQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOzs7Ozs7O0FBT0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBLFNBQVM7QUFDVCxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0EsQ0FBQztBQUNEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLCtEQUErRDtBQUMvRCw0REFBNEQ7QUFDNUQ7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxlQUFlLGdCQUFnQixzQ0FBc0Msa0JBQWtCO0FBQ3ZGLDhCQUE4QjtBQUM5QjtBQUNBO0FBQ0E7QUFDQTtBQUNBLHdCQUF3QjtBQUN4QjtBQUNBO0FBQ0EsQ0FBQzs7QUFFRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQzs7QUFFRDs7QUFFQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwyQkFBMkI7QUFDM0I7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxvQkFBb0I7QUFDcEI7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsZUFBZSxnQkFBZ0Isc0NBQXNDLGtCQUFrQjtBQUN2Riw4QkFBOEI7QUFDOUI7QUFDQTtBQUNBO0FBQ0E7QUFDQSx3QkFBd0I7QUFDeEI7QUFDQTtBQUNBLENBQUM7Ozs7O0FBS0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHNCQUFzQjtBQUN0QjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsNkNBQTZDO0FBQzdDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHFCQUFxQjtBQUNyQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsNkJBQTZCO0FBQzdCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxnQ0FBZ0MsOEJBQThCO0FBQzlEO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTs7OztBQUlBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esd0NBQXdDLFVBQVU7QUFDbEQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxpQkFBaUI7QUFDakI7QUFDQTtBQUNBLDhDQUE4QyxxQkFBcUI7QUFDbkU7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBbUMsY0FBYztBQUNqRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwrQkFBK0IsMkNBQTJDO0FBQzFFO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsZUFBZSxnQkFBZ0Isc0NBQXNDLGtCQUFrQjtBQUN2Riw4QkFBOEI7QUFDOUI7QUFDQTtBQUNBO0FBQ0E7QUFDQSx3QkFBd0I7QUFDeEI7QUFDQTtBQUNBLENBQUM7Ozs7OztBQU1EO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGdDQUFnQyxVQUFVO0FBQzFDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSx3RUFBd0U7QUFDeEU7QUFDQTtBQUNBLGlCQUFpQixxQ0FBcUMsdUJBQXVCLElBQUk7QUFDakY7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsaUJBQWlCO0FBQ2pCO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGVBQWUsZ0JBQWdCLHNDQUFzQyxrQkFBa0I7QUFDdkYsOEJBQThCO0FBQzlCO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esd0JBQXdCO0FBQ3hCO0FBQ0E7QUFDQSxDQUFDOzs7QUFHRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGVBQWUsZ0JBQWdCLHNDQUFzQyxrQkFBa0I7QUFDdkYsOEJBQThCO0FBQzlCO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esd0JBQXdCO0FBQ3hCO0FBQ0E7QUFDQSxDQUFDOzs7OztBQUtEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTtBQUNBLFdBQVcsZ0NBQW1COztBQUU5QjtBQUNBLGFBQWEsZ0NBQW1COztBQUVoQztBQUNBO0FBQ0E7QUFDQTtBQUNBLGVBQWUsZ0JBQWdCLHNDQUFzQyxrQkFBa0I7QUFDdkYsOEJBQThCO0FBQzlCO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esd0JBQXdCO0FBQ3hCO0FBQ0E7QUFDQSxDQUFDOzs7Ozs7QUFNRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGVBQWUsZ0JBQWdCLHNDQUFzQyxrQkFBa0I7QUFDdkYsOEJBQThCO0FBQzlCO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esd0JBQXdCO0FBQ3hCO0FBQ0E7QUFDQSxDQUFDOzs7Ozs7QUFNRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxrQ0FBa0MsbUJBQW1CO0FBQ3JEO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBLGtDQUFrQyxvQkFBb0I7QUFDdEQ7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EscUJBQXFCO0FBQ3JCLDJDQUEyQyxpQ0FBaUM7QUFDNUU7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQSw2QkFBNkIsK0JBQStCO0FBQzVEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBbUMsMkNBQTJDO0FBQzlFO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHdCQUF3QjtBQUN4QjtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQSxrREFBa0Q7QUFDbEQsYUFBYTtBQUNiO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0Esd0JBQXdCO0FBQ3hCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxpREFBaUQsNEJBQTRCO0FBQzdFO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLDBDQUEwQyw2Q0FBNkM7QUFDdkY7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGlDQUFpQywrQkFBK0I7QUFDaEUsd0NBQXdDLDRDQUE0QztBQUNwRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTs7Ozs7QUFLQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOzs7Ozs7Ozs7OztBQVdBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDs7QUFFQTs7OztBQUlBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLG1GQUFtRiw0Q0FBNEM7QUFDL0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esc0VBQXNFLDJDQUEyQztBQUNqSDtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGlCQUFpQjtBQUNqQjtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7Ozs7O0FBS0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxpQkFBaUI7QUFDakI7QUFDQTtBQUNBO0FBQ0EsaUJBQWlCO0FBQ2pCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0EsYUFBYTtBQUNiO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EseUJBQXlCO0FBQ3pCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBOzs7Ozs7OztBQVFBO0FBQ0E7QUFDQTtBQUNBO0FB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QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsNkJBQTZCLGFBQWE7QUFDMUM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFhO0FBQ2I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLG9CQUFvQixZQUFZO0FBQ2hDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOzs7Ozs7QUFNQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7Ozs7Ozs7Ozs7Ozs7QUFhQTtBQUNBO0FBQ0Esc0JBQXNCO0FBQ3RCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EseUNBQXlDO0FBQ3pDO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBLGlCQUFpQjtBQUNqQixLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUMsc0NBQXNDO0FBQ3ZDOztBQUVBOzs7O0FBSUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHNDQUFzQyxXQUFXLHVCQUF1QjtBQUN4RTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEOztBQUVBOzs7OztBQUtBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7QUFDRDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEtBQUs7QUFDTDtBQUNBLDhCQUE4QjtBQUM5QjtBQUNBO0FBQ0E7O0FBRUE7Ozs7OztBQU1BO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGtDQUFrQywyQ0FBMkM7QUFDN0U7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7Ozs7Ozs7Ozs7Ozs7QUFhQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esb0RBQW9EO0FBQ3BEO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQWE7QUFDYjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQSxTQUFTO0FBQ1Q7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0EsNkJBQTZCLG9DQUFvQztBQUNqRTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxxREFBcUQsT0FBTztBQUM1RDtBQUNBO0FBQ0E7QUFDQTtBQUNBLG1DQUFtQywyQkFBMkI7QUFDOUQsbUNBQW1DO0FBQ25DLFNBQVM7QUFDVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxpQkFBaUI7QUFDakI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQSxPQUFPO0FBQ1A7QUFDQSxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL2Jvb3RzdHJhcC5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvbGFyYXZlbC1lY2hvL2Rpc3QvZWNoby5qcyIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvcHJvY2Vzcy9icm93c2VyLmpzIiwid2VicGFjazovLy8uL25vZGVfbW9kdWxlcy9wdXNoZXItanMvZGlzdC93ZWIvcHVzaGVyLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIGltcG9ydCBFY2hvIGZyb20gJ2xhcmF2ZWwtZWNobyc7XG4vLyBpbXBvcnQgTGFyYXNvY2tldCBmcm9tICdsYXJhc29ja2V0LWpzJztcblxuLy8gd2luZG93LkVjaG8gPSBuZXcgRWNobyh7XG4vLyAgICAgYnJvYWRjYXN0ZXI6IExhcmFzb2NrZXQsXG4vLyAgICAgdG9rZW46IHByb2Nlc3MuZW52Lk1JWF9MQVJBU09DS0VUX1RPS0VOLFxuLy8gfSk7XG5cbmltcG9ydCBFY2hvIGZyb20gJ2xhcmF2ZWwtZWNobyc7XG5cbndpbmRvdy5QdXNoZXIgPSByZXF1aXJlKCdwdXNoZXItanMnKTtcblxud2luZG93LkVjaG8gPSBuZXcgRWNobyh7XG4gICAgYnJvYWRjYXN0ZXI6ICdwdXNoZXInLFxuICAgIGtleTogcHJvY2Vzcy5lbnYuTUlYX1BVU0hFUl9BUFBfS0VZLFxuICAgIGNsdXN0ZXI6IHByb2Nlc3MuZW52Lk1JWF9QVVNIRVJfQVBQX0NMVVNURVIsXG4gICAgZW5jcnlwdGVkOiB0cnVlXG4gICAgLy9mb3JjZVRMUzogdHJ1ZVxufSk7XG5cbldpbmRvdy5FY2hvLmNoYW5uZWwoJ2NoYXQnKVxuICAgIC5saXN0ZW4oJy5tZXNzYWdlJywgKGUpID0+IHtcbiAgICAgICAgY29uc29sZS5sb2coJy0tLS0gTWVzc2FnZSBBeWEgLS0tLScpO1xuICAgICAgICBjb25zb2xlLmxvZyhlKTtcbiAgICAgICAgY29uc29sZS5sb2coJy0tLS0gTWVzc2FnZSBBeWEgLS0tLScpO1xuICAgIH0pO1xuXG4vLyBFY2hvLnByaXZhdGUoJ2NoYXQnKVxuLy8gICAgIC5saXN0ZW4oJ01lc3NhZ2VTZW50RXZlbnQnLCAoZSkgPT4ge1xuLy8gICAgICAgICBjb25zb2xlLmxvZygnLS0tLSBNZXNzYWdlIEF5YSAtLS0tJyk7XG4vLyAgICAgICAgIGNvbnNvbGUubG9nKGUpO1xuLy8gICAgICAgICBjb25zb2xlLmxvZygnLS0tLSBNZXNzYWdlIEF5YSAtLS0tJyk7XG4vLyAgICAgfSk7XG5cbndpbmRvdy5fID0gcmVxdWlyZSgnbG9kYXNoJyk7XG53aW5kb3cuU3dhbCA9IHJlcXVpcmUoJ3N3ZWV0YWxlcnQyJyk7XG5cbi8qKlxuICogV2UnbGwgbG9hZCBqUXVlcnkgYW5kIHRoZSBCb290c3RyYXAgalF1ZXJ5IHBsdWdpbiB3aGljaCBwcm92aWRlcyBzdXBwb3J0XG4gKiBmb3IgSmF2YVNjcmlwdCBiYXNlZCBCb290c3RyYXAgZmVhdHVyZXMgc3VjaCBhcyBtb2RhbHMgYW5kIHRhYnMuIFRoaXNcbiAqIGNvZGUgbWF5IGJlIG1vZGlmaWVkIHRvIGZpdCB0aGUgc3BlY2lmaWMgbmVlZHMgb2YgeW91ciBhcHBsaWNhdGlvbi5cbiAqL1xuXG50cnkge1xuICAgIHdpbmRvdy5Qb3BwZXIgPSByZXF1aXJlKCdwb3BwZXIuanMnKS5kZWZhdWx0O1xuICAgIHdpbmRvdy4kID0gd2luZG93LmpRdWVyeSA9IHJlcXVpcmUoJ2pxdWVyeScpO1xuXG4gICAgcmVxdWlyZSgnYm9vdHN0cmFwJyk7XG59IGNhdGNoIChlKSB7fVxuXG4vKipcbiAqIFdlJ2xsIGxvYWQgdGhlIGF4aW9zIEhUVFAgbGlicmFyeSB3aGljaCBhbGxvd3MgdXMgdG8gZWFzaWx5IGlzc3VlIHJlcXVlc3RzXG4gKiB0byBvdXIgTGFyYXZlbCBiYWNrLWVuZC4gVGhpcyBsaWJyYXJ5IGF1dG9tYXRpY2FsbHkgaGFuZGxlcyBzZW5kaW5nIHRoZVxuICogQ1NSRiB0b2tlbiBhcyBhIGhlYWRlciBiYXNlZCBvbiB0aGUgdmFsdWUgb2YgdGhlIFwiWFNSRlwiIHRva2VuIGNvb2tpZS5cbiAqL1xuXG53aW5kb3cuYXhpb3MgPSByZXF1aXJlKCdheGlvcycpO1xuXG53aW5kb3cuYXhpb3MuZGVmYXVsdHMuaGVhZGVycy5jb21tb25bJ1gtUmVxdWVzdGVkLVdpdGgnXSA9ICdYTUxIdHRwUmVxdWVzdCc7XG5cbi8qKlxuICogRWNobyBleHBvc2VzIGFuIGV4cHJlc3NpdmUgQVBJIGZvciBzdWJzY3JpYmluZyB0byBjaGFubmVscyBhbmQgbGlzdGVuaW5nXG4gKiBmb3IgZXZlbnRzIHRoYXQgYXJlIGJyb2FkY2FzdCBieSBMYXJhdmVsLiBFY2hvIGFuZCBldmVudCBicm9hZGNhc3RpbmdcbiAqIGFsbG93cyB5b3VyIHRlYW0gdG8gZWFzaWx5IGJ1aWxkIHJvYnVzdCByZWFsLXRpbWUgd2ViIGFwcGxpY2F0aW9ucy5cbiAqL1xuXG4vLyBpbXBvcnQgRWNobyBmcm9tICdsYXJhdmVsLWVjaG8nO1xuXG4vLyB3aW5kb3cuUHVzaGVyID0gcmVxdWlyZSgncHVzaGVyLWpzJyk7XG5cbi8vIHdpbmRvdy5FY2hvID0gbmV3IEVjaG8oe1xuLy8gICAgIGJyb2FkY2FzdGVyOiAncHVzaGVyJyxcbi8vICAgICBrZXk6IHByb2Nlc3MuZW52Lk1JWF9QVVNIRVJfQVBQX0tFWSxcbi8vICAgICBjbHVzdGVyOiBwcm9jZXNzLmVudi5NSVhfUFVTSEVSX0FQUF9DTFVTVEVSLFxuLy8gICAgIGVuY3J5cHRlZDogdHJ1ZVxuLy8gfSk7XG4iLCJmdW5jdGlvbiBfY2xhc3NDYWxsQ2hlY2soaW5zdGFuY2UsIENvbnN0cnVjdG9yKSB7XG4gIGlmICghKGluc3RhbmNlIGluc3RhbmNlb2YgQ29uc3RydWN0b3IpKSB7XG4gICAgdGhyb3cgbmV3IFR5cGVFcnJvcihcIkNhbm5vdCBjYWxsIGEgY2xhc3MgYXMgYSBmdW5jdGlvblwiKTtcbiAgfVxufVxuXG5mdW5jdGlvbiBfZGVmaW5lUHJvcGVydGllcyh0YXJnZXQsIHByb3BzKSB7XG4gIGZvciAodmFyIGkgPSAwOyBpIDwgcHJvcHMubGVuZ3RoOyBpKyspIHtcbiAgICB2YXIgZGVzY3JpcHRvciA9IHByb3BzW2ldO1xuICAgIGRlc2NyaXB0b3IuZW51bWVyYWJsZSA9IGRlc2NyaXB0b3IuZW51bWVyYWJsZSB8fCBmYWxzZTtcbiAgICBkZXNjcmlwdG9yLmNvbmZpZ3VyYWJsZSA9IHRydWU7XG4gICAgaWYgKFwidmFsdWVcIiBpbiBkZXNjcmlwdG9yKSBkZXNjcmlwdG9yLndyaXRhYmxlID0gdHJ1ZTtcbiAgICBPYmplY3QuZGVmaW5lUHJvcGVydHkodGFyZ2V0LCBkZXNjcmlwdG9yLmtleSwgZGVzY3JpcHRvcik7XG4gIH1cbn1cblxuZnVuY3Rpb24gX2NyZWF0ZUNsYXNzKENvbnN0cnVjdG9yLCBwcm90b1Byb3BzLCBzdGF0aWNQcm9wcykge1xuICBpZiAocHJvdG9Qcm9wcykgX2RlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IucHJvdG90eXBlLCBwcm90b1Byb3BzKTtcbiAgaWYgKHN0YXRpY1Byb3BzKSBfZGVmaW5lUHJvcGVydGllcyhDb25zdHJ1Y3Rvciwgc3RhdGljUHJvcHMpO1xuICByZXR1cm4gQ29uc3RydWN0b3I7XG59XG5cbmZ1bmN0aW9uIF9leHRlbmRzKCkge1xuICBfZXh0ZW5kcyA9IE9iamVjdC5hc3NpZ24gfHwgZnVuY3Rpb24gKHRhcmdldCkge1xuICAgIGZvciAodmFyIGkgPSAxOyBpIDwgYXJndW1lbnRzLmxlbmd0aDsgaSsrKSB7XG4gICAgICB2YXIgc291cmNlID0gYXJndW1lbnRzW2ldO1xuXG4gICAgICBmb3IgKHZhciBrZXkgaW4gc291cmNlKSB7XG4gICAgICAgIGlmIChPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwoc291cmNlLCBrZXkpKSB7XG4gICAgICAgICAgdGFyZ2V0W2tleV0gPSBzb3VyY2Vba2V5XTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH1cblxuICAgIHJldHVybiB0YXJnZXQ7XG4gIH07XG5cbiAgcmV0dXJuIF9leHRlbmRzLmFwcGx5KHRoaXMsIGFyZ3VtZW50cyk7XG59XG5cbmZ1bmN0aW9uIF9pbmhlcml0cyhzdWJDbGFzcywgc3VwZXJDbGFzcykge1xuICBpZiAodHlwZW9mIHN1cGVyQ2xhc3MgIT09IFwiZnVuY3Rpb25cIiAmJiBzdXBlckNsYXNzICE9PSBudWxsKSB7XG4gICAgdGhyb3cgbmV3IFR5cGVFcnJvcihcIlN1cGVyIGV4cHJlc3Npb24gbXVzdCBlaXRoZXIgYmUgbnVsbCBvciBhIGZ1bmN0aW9uXCIpO1xuICB9XG5cbiAgc3ViQ2xhc3MucHJvdG90eXBlID0gT2JqZWN0LmNyZWF0ZShzdXBlckNsYXNzICYmIHN1cGVyQ2xhc3MucHJvdG90eXBlLCB7XG4gICAgY29uc3RydWN0b3I6IHtcbiAgICAgIHZhbHVlOiBzdWJDbGFzcyxcbiAgICAgIHdyaXRhYmxlOiB0cnVlLFxuICAgICAgY29uZmlndXJhYmxlOiB0cnVlXG4gICAgfVxuICB9KTtcbiAgaWYgKHN1cGVyQ2xhc3MpIF9zZXRQcm90b3R5cGVPZihzdWJDbGFzcywgc3VwZXJDbGFzcyk7XG59XG5cbmZ1bmN0aW9uIF9nZXRQcm90b3R5cGVPZihvKSB7XG4gIF9nZXRQcm90b3R5cGVPZiA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiA/IE9iamVjdC5nZXRQcm90b3R5cGVPZiA6IGZ1bmN0aW9uIF9nZXRQcm90b3R5cGVPZihvKSB7XG4gICAgcmV0dXJuIG8uX19wcm90b19fIHx8IE9iamVjdC5nZXRQcm90b3R5cGVPZihvKTtcbiAgfTtcbiAgcmV0dXJuIF9nZXRQcm90b3R5cGVPZihvKTtcbn1cblxuZnVuY3Rpb24gX3NldFByb3RvdHlwZU9mKG8sIHApIHtcbiAgX3NldFByb3RvdHlwZU9mID0gT2JqZWN0LnNldFByb3RvdHlwZU9mIHx8IGZ1bmN0aW9uIF9zZXRQcm90b3R5cGVPZihvLCBwKSB7XG4gICAgby5fX3Byb3RvX18gPSBwO1xuICAgIHJldHVybiBvO1xuICB9O1xuXG4gIHJldHVybiBfc2V0UHJvdG90eXBlT2YobywgcCk7XG59XG5cbmZ1bmN0aW9uIF9pc05hdGl2ZVJlZmxlY3RDb25zdHJ1Y3QoKSB7XG4gIGlmICh0eXBlb2YgUmVmbGVjdCA9PT0gXCJ1bmRlZmluZWRcIiB8fCAhUmVmbGVjdC5jb25zdHJ1Y3QpIHJldHVybiBmYWxzZTtcbiAgaWYgKFJlZmxlY3QuY29uc3RydWN0LnNoYW0pIHJldHVybiBmYWxzZTtcbiAgaWYgKHR5cGVvZiBQcm94eSA9PT0gXCJmdW5jdGlvblwiKSByZXR1cm4gdHJ1ZTtcblxuICB0cnkge1xuICAgIERhdGUucHJvdG90eXBlLnRvU3RyaW5nLmNhbGwoUmVmbGVjdC5jb25zdHJ1Y3QoRGF0ZSwgW10sIGZ1bmN0aW9uICgpIHt9KSk7XG4gICAgcmV0dXJuIHRydWU7XG4gIH0gY2F0Y2ggKGUpIHtcbiAgICByZXR1cm4gZmFsc2U7XG4gIH1cbn1cblxuZnVuY3Rpb24gX2Fzc2VydFRoaXNJbml0aWFsaXplZChzZWxmKSB7XG4gIGlmIChzZWxmID09PSB2b2lkIDApIHtcbiAgICB0aHJvdyBuZXcgUmVmZXJlbmNlRXJyb3IoXCJ0aGlzIGhhc24ndCBiZWVuIGluaXRpYWxpc2VkIC0gc3VwZXIoKSBoYXNuJ3QgYmVlbiBjYWxsZWRcIik7XG4gIH1cblxuICByZXR1cm4gc2VsZjtcbn1cblxuZnVuY3Rpb24gX3Bvc3NpYmxlQ29uc3RydWN0b3JSZXR1cm4oc2VsZiwgY2FsbCkge1xuICBpZiAoY2FsbCAmJiAodHlwZW9mIGNhbGwgPT09IFwib2JqZWN0XCIgfHwgdHlwZW9mIGNhbGwgPT09IFwiZnVuY3Rpb25cIikpIHtcbiAgICByZXR1cm4gY2FsbDtcbiAgfVxuXG4gIHJldHVybiBfYXNzZXJ0VGhpc0luaXRpYWxpemVkKHNlbGYpO1xufVxuXG5mdW5jdGlvbiBfY3JlYXRlU3VwZXIoRGVyaXZlZCkge1xuICB2YXIgaGFzTmF0aXZlUmVmbGVjdENvbnN0cnVjdCA9IF9pc05hdGl2ZVJlZmxlY3RDb25zdHJ1Y3QoKTtcblxuICByZXR1cm4gZnVuY3Rpb24gKCkge1xuICAgIHZhciBTdXBlciA9IF9nZXRQcm90b3R5cGVPZihEZXJpdmVkKSxcbiAgICAgICAgcmVzdWx0O1xuXG4gICAgaWYgKGhhc05hdGl2ZVJlZmxlY3RDb25zdHJ1Y3QpIHtcbiAgICAgIHZhciBOZXdUYXJnZXQgPSBfZ2V0UHJvdG90eXBlT2YodGhpcykuY29uc3RydWN0b3I7XG5cbiAgICAgIHJlc3VsdCA9IFJlZmxlY3QuY29uc3RydWN0KFN1cGVyLCBhcmd1bWVudHMsIE5ld1RhcmdldCk7XG4gICAgfSBlbHNlIHtcbiAgICAgIHJlc3VsdCA9IFN1cGVyLmFwcGx5KHRoaXMsIGFyZ3VtZW50cyk7XG4gICAgfVxuXG4gICAgcmV0dXJuIF9wb3NzaWJsZUNvbnN0cnVjdG9yUmV0dXJuKHRoaXMsIHJlc3VsdCk7XG4gIH07XG59XG5cbnZhciBDb25uZWN0b3IgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKCkge1xuICAvKipcclxuICAgKiBDcmVhdGUgYSBuZXcgY2xhc3MgaW5zdGFuY2UuXHJcbiAgICovXG4gIGZ1bmN0aW9uIENvbm5lY3RvcihvcHRpb25zKSB7XG4gICAgX2NsYXNzQ2FsbENoZWNrKHRoaXMsIENvbm5lY3Rvcik7XG5cbiAgICAvKipcclxuICAgICAqIERlZmF1bHQgY29ubmVjdG9yIG9wdGlvbnMuXHJcbiAgICAgKi9cbiAgICB0aGlzLl9kZWZhdWx0T3B0aW9ucyA9IHtcbiAgICAgIGF1dGg6IHtcbiAgICAgICAgaGVhZGVyczoge31cbiAgICAgIH0sXG4gICAgICBhdXRoRW5kcG9pbnQ6ICcvYnJvYWRjYXN0aW5nL2F1dGgnLFxuICAgICAgYnJvYWRjYXN0ZXI6ICdwdXNoZXInLFxuICAgICAgY3NyZlRva2VuOiBudWxsLFxuICAgICAgaG9zdDogbnVsbCxcbiAgICAgIGtleTogbnVsbCxcbiAgICAgIG5hbWVzcGFjZTogJ0FwcC5FdmVudHMnXG4gICAgfTtcbiAgICB0aGlzLnNldE9wdGlvbnMob3B0aW9ucyk7XG4gICAgdGhpcy5jb25uZWN0KCk7XG4gIH1cbiAgLyoqXHJcbiAgICogTWVyZ2UgdGhlIGN1c3RvbSBvcHRpb25zIHdpdGggdGhlIGRlZmF1bHRzLlxyXG4gICAqL1xuXG5cbiAgX2NyZWF0ZUNsYXNzKENvbm5lY3RvciwgW3tcbiAgICBrZXk6IFwic2V0T3B0aW9uc1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBzZXRPcHRpb25zKG9wdGlvbnMpIHtcbiAgICAgIHRoaXMub3B0aW9ucyA9IF9leHRlbmRzKHRoaXMuX2RlZmF1bHRPcHRpb25zLCBvcHRpb25zKTtcblxuICAgICAgaWYgKHRoaXMuY3NyZlRva2VuKCkpIHtcbiAgICAgICAgdGhpcy5vcHRpb25zLmF1dGguaGVhZGVyc1snWC1DU1JGLVRPS0VOJ10gPSB0aGlzLmNzcmZUb2tlbigpO1xuICAgICAgfVxuXG4gICAgICByZXR1cm4gb3B0aW9ucztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBFeHRyYWN0IHRoZSBDU1JGIHRva2VuIGZyb20gdGhlIHBhZ2UuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImNzcmZUb2tlblwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBjc3JmVG9rZW4oKSB7XG4gICAgICB2YXIgc2VsZWN0b3I7XG5cbiAgICAgIGlmICh0eXBlb2Ygd2luZG93ICE9PSAndW5kZWZpbmVkJyAmJiB3aW5kb3dbJ0xhcmF2ZWwnXSAmJiB3aW5kb3dbJ0xhcmF2ZWwnXS5jc3JmVG9rZW4pIHtcbiAgICAgICAgcmV0dXJuIHdpbmRvd1snTGFyYXZlbCddLmNzcmZUb2tlbjtcbiAgICAgIH0gZWxzZSBpZiAodGhpcy5vcHRpb25zLmNzcmZUb2tlbikge1xuICAgICAgICByZXR1cm4gdGhpcy5vcHRpb25zLmNzcmZUb2tlbjtcbiAgICAgIH0gZWxzZSBpZiAodHlwZW9mIGRvY3VtZW50ICE9PSAndW5kZWZpbmVkJyAmJiB0eXBlb2YgZG9jdW1lbnQucXVlcnlTZWxlY3RvciA9PT0gJ2Z1bmN0aW9uJyAmJiAoc2VsZWN0b3IgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykpKSB7XG4gICAgICAgIHJldHVybiBzZWxlY3Rvci5nZXRBdHRyaWJ1dGUoJ2NvbnRlbnQnKTtcbiAgICAgIH1cblxuICAgICAgcmV0dXJuIG51bGw7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIENvbm5lY3Rvcjtcbn0oKTtcblxuLyoqXHJcbiAqIFRoaXMgY2xhc3MgcmVwcmVzZW50cyBhIGJhc2ljIGNoYW5uZWwuXHJcbiAqL1xudmFyIENoYW5uZWwgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKCkge1xuICBmdW5jdGlvbiBDaGFubmVsKCkge1xuICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBDaGFubmVsKTtcbiAgfVxuXG4gIF9jcmVhdGVDbGFzcyhDaGFubmVsLCBbe1xuICAgIGtleTogXCJsaXN0ZW5Gb3JXaGlzcGVyXCIsXG5cbiAgICAvKipcclxuICAgICAqIExpc3RlbiBmb3IgYSB3aGlzcGVyIGV2ZW50IG9uIHRoZSBjaGFubmVsIGluc3RhbmNlLlxyXG4gICAgICovXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGxpc3RlbkZvcldoaXNwZXIoZXZlbnQsIGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcy5saXN0ZW4oJy5jbGllbnQtJyArIGV2ZW50LCBjYWxsYmFjayk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogTGlzdGVuIGZvciBhbiBldmVudCBvbiB0aGUgY2hhbm5lbCBpbnN0YW5jZS5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwibm90aWZpY2F0aW9uXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIG5vdGlmaWNhdGlvbihjYWxsYmFjaykge1xuICAgICAgcmV0dXJuIHRoaXMubGlzdGVuKCcuSWxsdW1pbmF0ZVxcXFxOb3RpZmljYXRpb25zXFxcXEV2ZW50c1xcXFxCcm9hZGNhc3ROb3RpZmljYXRpb25DcmVhdGVkJywgY2FsbGJhY2spO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFN0b3AgbGlzdGVuaW5nIGZvciBhIHdoaXNwZXIgZXZlbnQgb24gdGhlIGNoYW5uZWwgaW5zdGFuY2UuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInN0b3BMaXN0ZW5pbmdGb3JXaGlzcGVyXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHN0b3BMaXN0ZW5pbmdGb3JXaGlzcGVyKGV2ZW50LCBjYWxsYmFjaykge1xuICAgICAgcmV0dXJuIHRoaXMuc3RvcExpc3RlbmluZygnLmNsaWVudC0nICsgZXZlbnQsIGNhbGxiYWNrKTtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gQ2hhbm5lbDtcbn0oKTtcblxuLyoqXHJcbiAqIEV2ZW50IG5hbWUgZm9ybWF0dGVyXHJcbiAqL1xudmFyIEV2ZW50Rm9ybWF0dGVyID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgLyoqXHJcbiAgICogQ3JlYXRlIGEgbmV3IGNsYXNzIGluc3RhbmNlLlxyXG4gICAqL1xuICBmdW5jdGlvbiBFdmVudEZvcm1hdHRlcihuYW1lc3BhY2UpIHtcbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgRXZlbnRGb3JtYXR0ZXIpO1xuXG4gICAgdGhpcy5zZXROYW1lc3BhY2UobmFtZXNwYWNlKTtcbiAgfVxuICAvKipcclxuICAgKiBGb3JtYXQgdGhlIGdpdmVuIGV2ZW50IG5hbWUuXHJcbiAgICovXG5cblxuICBfY3JlYXRlQ2xhc3MoRXZlbnRGb3JtYXR0ZXIsIFt7XG4gICAga2V5OiBcImZvcm1hdFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBmb3JtYXQoZXZlbnQpIHtcbiAgICAgIGlmIChldmVudC5jaGFyQXQoMCkgPT09ICcuJyB8fCBldmVudC5jaGFyQXQoMCkgPT09ICdcXFxcJykge1xuICAgICAgICByZXR1cm4gZXZlbnQuc3Vic3RyKDEpO1xuICAgICAgfSBlbHNlIGlmICh0aGlzLm5hbWVzcGFjZSkge1xuICAgICAgICBldmVudCA9IHRoaXMubmFtZXNwYWNlICsgJy4nICsgZXZlbnQ7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiBldmVudC5yZXBsYWNlKC9cXC4vZywgJ1xcXFwnKTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBTZXQgdGhlIGV2ZW50IG5hbWVzcGFjZS5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwic2V0TmFtZXNwYWNlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHNldE5hbWVzcGFjZSh2YWx1ZSkge1xuICAgICAgdGhpcy5uYW1lc3BhY2UgPSB2YWx1ZTtcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gRXZlbnRGb3JtYXR0ZXI7XG59KCk7XG5cbi8qKlxyXG4gKiBUaGlzIGNsYXNzIHJlcHJlc2VudHMgYSBQdXNoZXIgY2hhbm5lbC5cclxuICovXG5cbnZhciBQdXNoZXJDaGFubmVsID0gLyojX19QVVJFX18qL2Z1bmN0aW9uIChfQ2hhbm5lbCkge1xuICBfaW5oZXJpdHMoUHVzaGVyQ2hhbm5lbCwgX0NoYW5uZWwpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoUHVzaGVyQ2hhbm5lbCk7XG5cbiAgLyoqXHJcbiAgICogQ3JlYXRlIGEgbmV3IGNsYXNzIGluc3RhbmNlLlxyXG4gICAqL1xuICBmdW5jdGlvbiBQdXNoZXJDaGFubmVsKHB1c2hlciwgbmFtZSwgb3B0aW9ucykge1xuICAgIHZhciBfdGhpcztcblxuICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBQdXNoZXJDaGFubmVsKTtcblxuICAgIF90aGlzID0gX3N1cGVyLmNhbGwodGhpcyk7XG4gICAgX3RoaXMubmFtZSA9IG5hbWU7XG4gICAgX3RoaXMucHVzaGVyID0gcHVzaGVyO1xuICAgIF90aGlzLm9wdGlvbnMgPSBvcHRpb25zO1xuICAgIF90aGlzLmV2ZW50Rm9ybWF0dGVyID0gbmV3IEV2ZW50Rm9ybWF0dGVyKF90aGlzLm9wdGlvbnMubmFtZXNwYWNlKTtcblxuICAgIF90aGlzLnN1YnNjcmliZSgpO1xuXG4gICAgcmV0dXJuIF90aGlzO1xuICB9XG4gIC8qKlxyXG4gICAqIFN1YnNjcmliZSB0byBhIFB1c2hlciBjaGFubmVsLlxyXG4gICAqL1xuXG5cbiAgX2NyZWF0ZUNsYXNzKFB1c2hlckNoYW5uZWwsIFt7XG4gICAga2V5OiBcInN1YnNjcmliZVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBzdWJzY3JpYmUoKSB7XG4gICAgICB0aGlzLnN1YnNjcmlwdGlvbiA9IHRoaXMucHVzaGVyLnN1YnNjcmliZSh0aGlzLm5hbWUpO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFVuc3Vic2NyaWJlIGZyb20gYSBQdXNoZXIgY2hhbm5lbC5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwidW5zdWJzY3JpYmVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gdW5zdWJzY3JpYmUoKSB7XG4gICAgICB0aGlzLnB1c2hlci51bnN1YnNjcmliZSh0aGlzLm5hbWUpO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIExpc3RlbiBmb3IgYW4gZXZlbnQgb24gdGhlIGNoYW5uZWwgaW5zdGFuY2UuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImxpc3RlblwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsaXN0ZW4oZXZlbnQsIGNhbGxiYWNrKSB7XG4gICAgICB0aGlzLm9uKHRoaXMuZXZlbnRGb3JtYXR0ZXIuZm9ybWF0KGV2ZW50KSwgY2FsbGJhY2spO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogTGlzdGVuIGZvciBhbGwgZXZlbnRzIG9uIHRoZSBjaGFubmVsIGluc3RhbmNlLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJsaXN0ZW5Ub0FsbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsaXN0ZW5Ub0FsbChjYWxsYmFjaykge1xuICAgICAgdmFyIF90aGlzMiA9IHRoaXM7XG5cbiAgICAgIHRoaXMuc3Vic2NyaXB0aW9uLmJpbmRfZ2xvYmFsKGZ1bmN0aW9uIChldmVudCwgZGF0YSkge1xuICAgICAgICBpZiAoZXZlbnQuc3RhcnRzV2l0aCgncHVzaGVyOicpKSB7XG4gICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgdmFyIG5hbWVzcGFjZSA9IF90aGlzMi5vcHRpb25zLm5hbWVzcGFjZS5yZXBsYWNlKC9cXC4vZywgJ1xcXFwnKTtcblxuICAgICAgICB2YXIgZm9ybWF0dGVkRXZlbnQgPSBldmVudC5zdGFydHNXaXRoKG5hbWVzcGFjZSkgPyBldmVudC5zdWJzdHJpbmcobmFtZXNwYWNlLmxlbmd0aCArIDEpIDogJy4nICsgZXZlbnQ7XG4gICAgICAgIGNhbGxiYWNrKGZvcm1hdHRlZEV2ZW50LCBkYXRhKTtcbiAgICAgIH0pO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogU3RvcCBsaXN0ZW5pbmcgZm9yIGFuIGV2ZW50IG9uIHRoZSBjaGFubmVsIGluc3RhbmNlLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJzdG9wTGlzdGVuaW5nXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHN0b3BMaXN0ZW5pbmcoZXZlbnQsIGNhbGxiYWNrKSB7XG4gICAgICBpZiAoY2FsbGJhY2spIHtcbiAgICAgICAgdGhpcy5zdWJzY3JpcHRpb24udW5iaW5kKHRoaXMuZXZlbnRGb3JtYXR0ZXIuZm9ybWF0KGV2ZW50KSwgY2FsbGJhY2spO1xuICAgICAgfSBlbHNlIHtcbiAgICAgICAgdGhpcy5zdWJzY3JpcHRpb24udW5iaW5kKHRoaXMuZXZlbnRGb3JtYXR0ZXIuZm9ybWF0KGV2ZW50KSk7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFN0b3AgbGlzdGVuaW5nIGZvciBhbGwgZXZlbnRzIG9uIHRoZSBjaGFubmVsIGluc3RhbmNlLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJzdG9wTGlzdGVuaW5nVG9BbGxcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gc3RvcExpc3RlbmluZ1RvQWxsKGNhbGxiYWNrKSB7XG4gICAgICBpZiAoY2FsbGJhY2spIHtcbiAgICAgICAgdGhpcy5zdWJzY3JpcHRpb24udW5iaW5kX2dsb2JhbChjYWxsYmFjayk7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICB0aGlzLnN1YnNjcmlwdGlvbi51bmJpbmRfZ2xvYmFsKCk7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFJlZ2lzdGVyIGEgY2FsbGJhY2sgdG8gYmUgY2FsbGVkIGFueXRpbWUgYSBzdWJzY3JpcHRpb24gc3VjY2VlZHMuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInN1YnNjcmliZWRcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gc3Vic2NyaWJlZChjYWxsYmFjaykge1xuICAgICAgdGhpcy5vbigncHVzaGVyOnN1YnNjcmlwdGlvbl9zdWNjZWVkZWQnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNhbGxiYWNrKCk7XG4gICAgICB9KTtcbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFJlZ2lzdGVyIGEgY2FsbGJhY2sgdG8gYmUgY2FsbGVkIGFueXRpbWUgYSBzdWJzY3JpcHRpb24gZXJyb3Igb2NjdXJzLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJlcnJvclwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBlcnJvcihjYWxsYmFjaykge1xuICAgICAgdGhpcy5vbigncHVzaGVyOnN1YnNjcmlwdGlvbl9lcnJvcicsIGZ1bmN0aW9uIChzdGF0dXMpIHtcbiAgICAgICAgY2FsbGJhY2soc3RhdHVzKTtcbiAgICAgIH0pO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogQmluZCBhIGNoYW5uZWwgdG8gYW4gZXZlbnQuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcIm9uXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIG9uKGV2ZW50LCBjYWxsYmFjaykge1xuICAgICAgdGhpcy5zdWJzY3JpcHRpb24uYmluZChldmVudCwgY2FsbGJhY2spO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIFB1c2hlckNoYW5uZWw7XG59KENoYW5uZWwpO1xuXG4vKipcclxuICogVGhpcyBjbGFzcyByZXByZXNlbnRzIGEgUHVzaGVyIHByaXZhdGUgY2hhbm5lbC5cclxuICovXG5cbnZhciBQdXNoZXJQcml2YXRlQ2hhbm5lbCA9IC8qI19fUFVSRV9fKi9mdW5jdGlvbiAoX1B1c2hlckNoYW5uZWwpIHtcbiAgX2luaGVyaXRzKFB1c2hlclByaXZhdGVDaGFubmVsLCBfUHVzaGVyQ2hhbm5lbCk7XG5cbiAgdmFyIF9zdXBlciA9IF9jcmVhdGVTdXBlcihQdXNoZXJQcml2YXRlQ2hhbm5lbCk7XG5cbiAgZnVuY3Rpb24gUHVzaGVyUHJpdmF0ZUNoYW5uZWwoKSB7XG4gICAgX2NsYXNzQ2FsbENoZWNrKHRoaXMsIFB1c2hlclByaXZhdGVDaGFubmVsKTtcblxuICAgIHJldHVybiBfc3VwZXIuYXBwbHkodGhpcywgYXJndW1lbnRzKTtcbiAgfVxuXG4gIF9jcmVhdGVDbGFzcyhQdXNoZXJQcml2YXRlQ2hhbm5lbCwgW3tcbiAgICBrZXk6IFwid2hpc3BlclwiLFxuXG4gICAgLyoqXHJcbiAgICAgKiBUcmlnZ2VyIGNsaWVudCBldmVudCBvbiB0aGUgY2hhbm5lbC5cclxuICAgICAqL1xuICAgIHZhbHVlOiBmdW5jdGlvbiB3aGlzcGVyKGV2ZW50TmFtZSwgZGF0YSkge1xuICAgICAgdGhpcy5wdXNoZXIuY2hhbm5lbHMuY2hhbm5lbHNbdGhpcy5uYW1lXS50cmlnZ2VyKFwiY2xpZW50LVwiLmNvbmNhdChldmVudE5hbWUpLCBkYXRhKTtcbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBQdXNoZXJQcml2YXRlQ2hhbm5lbDtcbn0oUHVzaGVyQ2hhbm5lbCk7XG5cbi8qKlxyXG4gKiBUaGlzIGNsYXNzIHJlcHJlc2VudHMgYSBQdXNoZXIgcHJpdmF0ZSBjaGFubmVsLlxyXG4gKi9cblxudmFyIFB1c2hlckVuY3J5cHRlZFByaXZhdGVDaGFubmVsID0gLyojX19QVVJFX18qL2Z1bmN0aW9uIChfUHVzaGVyQ2hhbm5lbCkge1xuICBfaW5oZXJpdHMoUHVzaGVyRW5jcnlwdGVkUHJpdmF0ZUNoYW5uZWwsIF9QdXNoZXJDaGFubmVsKTtcblxuICB2YXIgX3N1cGVyID0gX2NyZWF0ZVN1cGVyKFB1c2hlckVuY3J5cHRlZFByaXZhdGVDaGFubmVsKTtcblxuICBmdW5jdGlvbiBQdXNoZXJFbmNyeXB0ZWRQcml2YXRlQ2hhbm5lbCgpIHtcbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgUHVzaGVyRW5jcnlwdGVkUHJpdmF0ZUNoYW5uZWwpO1xuXG4gICAgcmV0dXJuIF9zdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpO1xuICB9XG5cbiAgX2NyZWF0ZUNsYXNzKFB1c2hlckVuY3J5cHRlZFByaXZhdGVDaGFubmVsLCBbe1xuICAgIGtleTogXCJ3aGlzcGVyXCIsXG5cbiAgICAvKipcclxuICAgICAqIFRyaWdnZXIgY2xpZW50IGV2ZW50IG9uIHRoZSBjaGFubmVsLlxyXG4gICAgICovXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHdoaXNwZXIoZXZlbnROYW1lLCBkYXRhKSB7XG4gICAgICB0aGlzLnB1c2hlci5jaGFubmVscy5jaGFubmVsc1t0aGlzLm5hbWVdLnRyaWdnZXIoXCJjbGllbnQtXCIuY29uY2F0KGV2ZW50TmFtZSksIGRhdGEpO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIFB1c2hlckVuY3J5cHRlZFByaXZhdGVDaGFubmVsO1xufShQdXNoZXJDaGFubmVsKTtcblxuLyoqXHJcbiAqIFRoaXMgY2xhc3MgcmVwcmVzZW50cyBhIFB1c2hlciBwcmVzZW5jZSBjaGFubmVsLlxyXG4gKi9cblxudmFyIFB1c2hlclByZXNlbmNlQ2hhbm5lbCA9IC8qI19fUFVSRV9fKi9mdW5jdGlvbiAoX1B1c2hlckNoYW5uZWwpIHtcbiAgX2luaGVyaXRzKFB1c2hlclByZXNlbmNlQ2hhbm5lbCwgX1B1c2hlckNoYW5uZWwpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoUHVzaGVyUHJlc2VuY2VDaGFubmVsKTtcblxuICBmdW5jdGlvbiBQdXNoZXJQcmVzZW5jZUNoYW5uZWwoKSB7XG4gICAgX2NsYXNzQ2FsbENoZWNrKHRoaXMsIFB1c2hlclByZXNlbmNlQ2hhbm5lbCk7XG5cbiAgICByZXR1cm4gX3N1cGVyLmFwcGx5KHRoaXMsIGFyZ3VtZW50cyk7XG4gIH1cblxuICBfY3JlYXRlQ2xhc3MoUHVzaGVyUHJlc2VuY2VDaGFubmVsLCBbe1xuICAgIGtleTogXCJoZXJlXCIsXG5cbiAgICAvKipcclxuICAgICAqIFJlZ2lzdGVyIGEgY2FsbGJhY2sgdG8gYmUgY2FsbGVkIGFueXRpbWUgdGhlIG1lbWJlciBsaXN0IGNoYW5nZXMuXHJcbiAgICAgKi9cbiAgICB2YWx1ZTogZnVuY3Rpb24gaGVyZShjYWxsYmFjaykge1xuICAgICAgdGhpcy5vbigncHVzaGVyOnN1YnNjcmlwdGlvbl9zdWNjZWVkZWQnLCBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICBjYWxsYmFjayhPYmplY3Qua2V5cyhkYXRhLm1lbWJlcnMpLm1hcChmdW5jdGlvbiAoaykge1xuICAgICAgICAgIHJldHVybiBkYXRhLm1lbWJlcnNba107XG4gICAgICAgIH0pKTtcbiAgICAgIH0pO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogTGlzdGVuIGZvciBzb21lb25lIGpvaW5pbmcgdGhlIGNoYW5uZWwuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImpvaW5pbmdcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gam9pbmluZyhjYWxsYmFjaykge1xuICAgICAgdGhpcy5vbigncHVzaGVyOm1lbWJlcl9hZGRlZCcsIGZ1bmN0aW9uIChtZW1iZXIpIHtcbiAgICAgICAgY2FsbGJhY2sobWVtYmVyLmluZm8pO1xuICAgICAgfSk7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBMaXN0ZW4gZm9yIHNvbWVvbmUgbGVhdmluZyB0aGUgY2hhbm5lbC5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwibGVhdmluZ1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsZWF2aW5nKGNhbGxiYWNrKSB7XG4gICAgICB0aGlzLm9uKCdwdXNoZXI6bWVtYmVyX3JlbW92ZWQnLCBmdW5jdGlvbiAobWVtYmVyKSB7XG4gICAgICAgIGNhbGxiYWNrKG1lbWJlci5pbmZvKTtcbiAgICAgIH0pO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogVHJpZ2dlciBjbGllbnQgZXZlbnQgb24gdGhlIGNoYW5uZWwuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcIndoaXNwZXJcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gd2hpc3BlcihldmVudE5hbWUsIGRhdGEpIHtcbiAgICAgIHRoaXMucHVzaGVyLmNoYW5uZWxzLmNoYW5uZWxzW3RoaXMubmFtZV0udHJpZ2dlcihcImNsaWVudC1cIi5jb25jYXQoZXZlbnROYW1lKSwgZGF0YSk7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gUHVzaGVyUHJlc2VuY2VDaGFubmVsO1xufShQdXNoZXJDaGFubmVsKTtcblxuLyoqXHJcbiAqIFRoaXMgY2xhc3MgcmVwcmVzZW50cyBhIFNvY2tldC5pbyBjaGFubmVsLlxyXG4gKi9cblxudmFyIFNvY2tldElvQ2hhbm5lbCA9IC8qI19fUFVSRV9fKi9mdW5jdGlvbiAoX0NoYW5uZWwpIHtcbiAgX2luaGVyaXRzKFNvY2tldElvQ2hhbm5lbCwgX0NoYW5uZWwpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoU29ja2V0SW9DaGFubmVsKTtcblxuICAvKipcclxuICAgKiBDcmVhdGUgYSBuZXcgY2xhc3MgaW5zdGFuY2UuXHJcbiAgICovXG4gIGZ1bmN0aW9uIFNvY2tldElvQ2hhbm5lbChzb2NrZXQsIG5hbWUsIG9wdGlvbnMpIHtcbiAgICB2YXIgX3RoaXM7XG5cbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgU29ja2V0SW9DaGFubmVsKTtcblxuICAgIF90aGlzID0gX3N1cGVyLmNhbGwodGhpcyk7XG4gICAgLyoqXHJcbiAgICAgKiBUaGUgZXZlbnQgY2FsbGJhY2tzIGFwcGxpZWQgdG8gdGhlIHNvY2tldC5cclxuICAgICAqL1xuXG4gICAgX3RoaXMuZXZlbnRzID0ge307XG4gICAgLyoqXHJcbiAgICAgKiBVc2VyIHN1cHBsaWVkIGNhbGxiYWNrcyBmb3IgZXZlbnRzIG9uIHRoaXMgY2hhbm5lbC5cclxuICAgICAqL1xuXG4gICAgX3RoaXMubGlzdGVuZXJzID0ge307XG4gICAgX3RoaXMubmFtZSA9IG5hbWU7XG4gICAgX3RoaXMuc29ja2V0ID0gc29ja2V0O1xuICAgIF90aGlzLm9wdGlvbnMgPSBvcHRpb25zO1xuICAgIF90aGlzLmV2ZW50Rm9ybWF0dGVyID0gbmV3IEV2ZW50Rm9ybWF0dGVyKF90aGlzLm9wdGlvbnMubmFtZXNwYWNlKTtcblxuICAgIF90aGlzLnN1YnNjcmliZSgpO1xuXG4gICAgcmV0dXJuIF90aGlzO1xuICB9XG4gIC8qKlxyXG4gICAqIFN1YnNjcmliZSB0byBhIFNvY2tldC5pbyBjaGFubmVsLlxyXG4gICAqL1xuXG5cbiAgX2NyZWF0ZUNsYXNzKFNvY2tldElvQ2hhbm5lbCwgW3tcbiAgICBrZXk6IFwic3Vic2NyaWJlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHN1YnNjcmliZSgpIHtcbiAgICAgIHRoaXMuc29ja2V0LmVtaXQoJ3N1YnNjcmliZScsIHtcbiAgICAgICAgY2hhbm5lbDogdGhpcy5uYW1lLFxuICAgICAgICBhdXRoOiB0aGlzLm9wdGlvbnMuYXV0aCB8fCB7fVxuICAgICAgfSk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogVW5zdWJzY3JpYmUgZnJvbSBjaGFubmVsIGFuZCB1YmluZCBldmVudCBjYWxsYmFja3MuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInVuc3Vic2NyaWJlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHVuc3Vic2NyaWJlKCkge1xuICAgICAgdGhpcy51bmJpbmQoKTtcbiAgICAgIHRoaXMuc29ja2V0LmVtaXQoJ3Vuc3Vic2NyaWJlJywge1xuICAgICAgICBjaGFubmVsOiB0aGlzLm5hbWUsXG4gICAgICAgIGF1dGg6IHRoaXMub3B0aW9ucy5hdXRoIHx8IHt9XG4gICAgICB9KTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBMaXN0ZW4gZm9yIGFuIGV2ZW50IG9uIHRoZSBjaGFubmVsIGluc3RhbmNlLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJsaXN0ZW5cIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gbGlzdGVuKGV2ZW50LCBjYWxsYmFjaykge1xuICAgICAgdGhpcy5vbih0aGlzLmV2ZW50Rm9ybWF0dGVyLmZvcm1hdChldmVudCksIGNhbGxiYWNrKTtcbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFN0b3AgbGlzdGVuaW5nIGZvciBhbiBldmVudCBvbiB0aGUgY2hhbm5lbCBpbnN0YW5jZS5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwic3RvcExpc3RlbmluZ1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBzdG9wTGlzdGVuaW5nKGV2ZW50LCBjYWxsYmFjaykge1xuICAgICAgdGhpcy51bmJpbmRFdmVudCh0aGlzLmV2ZW50Rm9ybWF0dGVyLmZvcm1hdChldmVudCksIGNhbGxiYWNrKTtcbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFJlZ2lzdGVyIGEgY2FsbGJhY2sgdG8gYmUgY2FsbGVkIGFueXRpbWUgYSBzdWJzY3JpcHRpb24gc3VjY2VlZHMuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInN1YnNjcmliZWRcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gc3Vic2NyaWJlZChjYWxsYmFjaykge1xuICAgICAgdGhpcy5vbignY29ubmVjdCcsIGZ1bmN0aW9uIChzb2NrZXQpIHtcbiAgICAgICAgY2FsbGJhY2soc29ja2V0KTtcbiAgICAgIH0pO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogUmVnaXN0ZXIgYSBjYWxsYmFjayB0byBiZSBjYWxsZWQgYW55dGltZSBhbiBlcnJvciBvY2N1cnMuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImVycm9yXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGVycm9yKGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBCaW5kIHRoZSBjaGFubmVsJ3Mgc29ja2V0IHRvIGFuIGV2ZW50IGFuZCBzdG9yZSB0aGUgY2FsbGJhY2suXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcIm9uXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIG9uKGV2ZW50LCBjYWxsYmFjaykge1xuICAgICAgdmFyIF90aGlzMiA9IHRoaXM7XG5cbiAgICAgIHRoaXMubGlzdGVuZXJzW2V2ZW50XSA9IHRoaXMubGlzdGVuZXJzW2V2ZW50XSB8fCBbXTtcblxuICAgICAgaWYgKCF0aGlzLmV2ZW50c1tldmVudF0pIHtcbiAgICAgICAgdGhpcy5ldmVudHNbZXZlbnRdID0gZnVuY3Rpb24gKGNoYW5uZWwsIGRhdGEpIHtcbiAgICAgICAgICBpZiAoX3RoaXMyLm5hbWUgPT09IGNoYW5uZWwgJiYgX3RoaXMyLmxpc3RlbmVyc1tldmVudF0pIHtcbiAgICAgICAgICAgIF90aGlzMi5saXN0ZW5lcnNbZXZlbnRdLmZvckVhY2goZnVuY3Rpb24gKGNiKSB7XG4gICAgICAgICAgICAgIHJldHVybiBjYihkYXRhKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgIH1cbiAgICAgICAgfTtcblxuICAgICAgICB0aGlzLnNvY2tldC5vbihldmVudCwgdGhpcy5ldmVudHNbZXZlbnRdKTtcbiAgICAgIH1cblxuICAgICAgdGhpcy5saXN0ZW5lcnNbZXZlbnRdLnB1c2goY2FsbGJhY2spO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogVW5iaW5kIHRoZSBjaGFubmVsJ3Mgc29ja2V0IGZyb20gYWxsIHN0b3JlZCBldmVudCBjYWxsYmFja3MuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInVuYmluZFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiB1bmJpbmQoKSB7XG4gICAgICB2YXIgX3RoaXMzID0gdGhpcztcblxuICAgICAgT2JqZWN0LmtleXModGhpcy5ldmVudHMpLmZvckVhY2goZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIF90aGlzMy51bmJpbmRFdmVudChldmVudCk7XG4gICAgICB9KTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBVbmJpbmQgdGhlIGxpc3RlbmVycyBmb3IgdGhlIGdpdmVuIGV2ZW50LlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJ1bmJpbmRFdmVudFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiB1bmJpbmRFdmVudChldmVudCwgY2FsbGJhY2spIHtcbiAgICAgIHRoaXMubGlzdGVuZXJzW2V2ZW50XSA9IHRoaXMubGlzdGVuZXJzW2V2ZW50XSB8fCBbXTtcblxuICAgICAgaWYgKGNhbGxiYWNrKSB7XG4gICAgICAgIHRoaXMubGlzdGVuZXJzW2V2ZW50XSA9IHRoaXMubGlzdGVuZXJzW2V2ZW50XS5maWx0ZXIoZnVuY3Rpb24gKGNiKSB7XG4gICAgICAgICAgcmV0dXJuIGNiICE9PSBjYWxsYmFjaztcbiAgICAgICAgfSk7XG4gICAgICB9XG5cbiAgICAgIGlmICghY2FsbGJhY2sgfHwgdGhpcy5saXN0ZW5lcnNbZXZlbnRdLmxlbmd0aCA9PT0gMCkge1xuICAgICAgICBpZiAodGhpcy5ldmVudHNbZXZlbnRdKSB7XG4gICAgICAgICAgdGhpcy5zb2NrZXQucmVtb3ZlTGlzdGVuZXIoZXZlbnQsIHRoaXMuZXZlbnRzW2V2ZW50XSk7XG4gICAgICAgICAgZGVsZXRlIHRoaXMuZXZlbnRzW2V2ZW50XTtcbiAgICAgICAgfVxuXG4gICAgICAgIGRlbGV0ZSB0aGlzLmxpc3RlbmVyc1tldmVudF07XG4gICAgICB9XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIFNvY2tldElvQ2hhbm5lbDtcbn0oQ2hhbm5lbCk7XG5cbi8qKlxyXG4gKiBUaGlzIGNsYXNzIHJlcHJlc2VudHMgYSBTb2NrZXQuaW8gcHJpdmF0ZSBjaGFubmVsLlxyXG4gKi9cblxudmFyIFNvY2tldElvUHJpdmF0ZUNoYW5uZWwgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKF9Tb2NrZXRJb0NoYW5uZWwpIHtcbiAgX2luaGVyaXRzKFNvY2tldElvUHJpdmF0ZUNoYW5uZWwsIF9Tb2NrZXRJb0NoYW5uZWwpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoU29ja2V0SW9Qcml2YXRlQ2hhbm5lbCk7XG5cbiAgZnVuY3Rpb24gU29ja2V0SW9Qcml2YXRlQ2hhbm5lbCgpIHtcbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgU29ja2V0SW9Qcml2YXRlQ2hhbm5lbCk7XG5cbiAgICByZXR1cm4gX3N1cGVyLmFwcGx5KHRoaXMsIGFyZ3VtZW50cyk7XG4gIH1cblxuICBfY3JlYXRlQ2xhc3MoU29ja2V0SW9Qcml2YXRlQ2hhbm5lbCwgW3tcbiAgICBrZXk6IFwid2hpc3BlclwiLFxuXG4gICAgLyoqXHJcbiAgICAgKiBUcmlnZ2VyIGNsaWVudCBldmVudCBvbiB0aGUgY2hhbm5lbC5cclxuICAgICAqL1xuICAgIHZhbHVlOiBmdW5jdGlvbiB3aGlzcGVyKGV2ZW50TmFtZSwgZGF0YSkge1xuICAgICAgdGhpcy5zb2NrZXQuZW1pdCgnY2xpZW50IGV2ZW50Jywge1xuICAgICAgICBjaGFubmVsOiB0aGlzLm5hbWUsXG4gICAgICAgIGV2ZW50OiBcImNsaWVudC1cIi5jb25jYXQoZXZlbnROYW1lKSxcbiAgICAgICAgZGF0YTogZGF0YVxuICAgICAgfSk7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gU29ja2V0SW9Qcml2YXRlQ2hhbm5lbDtcbn0oU29ja2V0SW9DaGFubmVsKTtcblxuLyoqXHJcbiAqIFRoaXMgY2xhc3MgcmVwcmVzZW50cyBhIFNvY2tldC5pbyBwcmVzZW5jZSBjaGFubmVsLlxyXG4gKi9cblxudmFyIFNvY2tldElvUHJlc2VuY2VDaGFubmVsID0gLyojX19QVVJFX18qL2Z1bmN0aW9uIChfU29ja2V0SW9Qcml2YXRlQ2hhbm4pIHtcbiAgX2luaGVyaXRzKFNvY2tldElvUHJlc2VuY2VDaGFubmVsLCBfU29ja2V0SW9Qcml2YXRlQ2hhbm4pO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoU29ja2V0SW9QcmVzZW5jZUNoYW5uZWwpO1xuXG4gIGZ1bmN0aW9uIFNvY2tldElvUHJlc2VuY2VDaGFubmVsKCkge1xuICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBTb2NrZXRJb1ByZXNlbmNlQ2hhbm5lbCk7XG5cbiAgICByZXR1cm4gX3N1cGVyLmFwcGx5KHRoaXMsIGFyZ3VtZW50cyk7XG4gIH1cblxuICBfY3JlYXRlQ2xhc3MoU29ja2V0SW9QcmVzZW5jZUNoYW5uZWwsIFt7XG4gICAga2V5OiBcImhlcmVcIixcblxuICAgIC8qKlxyXG4gICAgICogUmVnaXN0ZXIgYSBjYWxsYmFjayB0byBiZSBjYWxsZWQgYW55dGltZSB0aGUgbWVtYmVyIGxpc3QgY2hhbmdlcy5cclxuICAgICAqL1xuICAgIHZhbHVlOiBmdW5jdGlvbiBoZXJlKGNhbGxiYWNrKSB7XG4gICAgICB0aGlzLm9uKCdwcmVzZW5jZTpzdWJzY3JpYmVkJywgZnVuY3Rpb24gKG1lbWJlcnMpIHtcbiAgICAgICAgY2FsbGJhY2sobWVtYmVycy5tYXAoZnVuY3Rpb24gKG0pIHtcbiAgICAgICAgICByZXR1cm4gbS51c2VyX2luZm87XG4gICAgICAgIH0pKTtcbiAgICAgIH0pO1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogTGlzdGVuIGZvciBzb21lb25lIGpvaW5pbmcgdGhlIGNoYW5uZWwuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImpvaW5pbmdcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gam9pbmluZyhjYWxsYmFjaykge1xuICAgICAgdGhpcy5vbigncHJlc2VuY2U6am9pbmluZycsIGZ1bmN0aW9uIChtZW1iZXIpIHtcbiAgICAgICAgcmV0dXJuIGNhbGxiYWNrKG1lbWJlci51c2VyX2luZm8pO1xuICAgICAgfSk7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBMaXN0ZW4gZm9yIHNvbWVvbmUgbGVhdmluZyB0aGUgY2hhbm5lbC5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwibGVhdmluZ1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsZWF2aW5nKGNhbGxiYWNrKSB7XG4gICAgICB0aGlzLm9uKCdwcmVzZW5jZTpsZWF2aW5nJywgZnVuY3Rpb24gKG1lbWJlcikge1xuICAgICAgICByZXR1cm4gY2FsbGJhY2sobWVtYmVyLnVzZXJfaW5mbyk7XG4gICAgICB9KTtcbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBTb2NrZXRJb1ByZXNlbmNlQ2hhbm5lbDtcbn0oU29ja2V0SW9Qcml2YXRlQ2hhbm5lbCk7XG5cbi8qKlxyXG4gKiBUaGlzIGNsYXNzIHJlcHJlc2VudHMgYSBudWxsIGNoYW5uZWwuXHJcbiAqL1xuXG52YXIgTnVsbENoYW5uZWwgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKF9DaGFubmVsKSB7XG4gIF9pbmhlcml0cyhOdWxsQ2hhbm5lbCwgX0NoYW5uZWwpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoTnVsbENoYW5uZWwpO1xuXG4gIGZ1bmN0aW9uIE51bGxDaGFubmVsKCkge1xuICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBOdWxsQ2hhbm5lbCk7XG5cbiAgICByZXR1cm4gX3N1cGVyLmFwcGx5KHRoaXMsIGFyZ3VtZW50cyk7XG4gIH1cblxuICBfY3JlYXRlQ2xhc3MoTnVsbENoYW5uZWwsIFt7XG4gICAga2V5OiBcInN1YnNjcmliZVwiLFxuXG4gICAgLyoqXHJcbiAgICAgKiBTdWJzY3JpYmUgdG8gYSBjaGFubmVsLlxyXG4gICAgICovXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHN1YnNjcmliZSgpIHt9IC8vXG5cbiAgICAvKipcclxuICAgICAqIFVuc3Vic2NyaWJlIGZyb20gYSBjaGFubmVsLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJ1bnN1YnNjcmliZVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiB1bnN1YnNjcmliZSgpIHt9IC8vXG5cbiAgICAvKipcclxuICAgICAqIExpc3RlbiBmb3IgYW4gZXZlbnQgb24gdGhlIGNoYW5uZWwgaW5zdGFuY2UuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImxpc3RlblwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsaXN0ZW4oZXZlbnQsIGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBTdG9wIGxpc3RlbmluZyBmb3IgYW4gZXZlbnQgb24gdGhlIGNoYW5uZWwgaW5zdGFuY2UuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInN0b3BMaXN0ZW5pbmdcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gc3RvcExpc3RlbmluZyhldmVudCwgY2FsbGJhY2spIHtcbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFJlZ2lzdGVyIGEgY2FsbGJhY2sgdG8gYmUgY2FsbGVkIGFueXRpbWUgYSBzdWJzY3JpcHRpb24gc3VjY2VlZHMuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInN1YnNjcmliZWRcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gc3Vic2NyaWJlZChjYWxsYmFjaykge1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogUmVnaXN0ZXIgYSBjYWxsYmFjayB0byBiZSBjYWxsZWQgYW55dGltZSBhbiBlcnJvciBvY2N1cnMuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImVycm9yXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGVycm9yKGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBCaW5kIGEgY2hhbm5lbCB0byBhbiBldmVudC5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwib25cIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gb24oZXZlbnQsIGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gTnVsbENoYW5uZWw7XG59KENoYW5uZWwpO1xuXG4vKipcclxuICogVGhpcyBjbGFzcyByZXByZXNlbnRzIGEgbnVsbCBwcml2YXRlIGNoYW5uZWwuXHJcbiAqL1xuXG52YXIgTnVsbFByaXZhdGVDaGFubmVsID0gLyojX19QVVJFX18qL2Z1bmN0aW9uIChfTnVsbENoYW5uZWwpIHtcbiAgX2luaGVyaXRzKE51bGxQcml2YXRlQ2hhbm5lbCwgX051bGxDaGFubmVsKTtcblxuICB2YXIgX3N1cGVyID0gX2NyZWF0ZVN1cGVyKE51bGxQcml2YXRlQ2hhbm5lbCk7XG5cbiAgZnVuY3Rpb24gTnVsbFByaXZhdGVDaGFubmVsKCkge1xuICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBOdWxsUHJpdmF0ZUNoYW5uZWwpO1xuXG4gICAgcmV0dXJuIF9zdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpO1xuICB9XG5cbiAgX2NyZWF0ZUNsYXNzKE51bGxQcml2YXRlQ2hhbm5lbCwgW3tcbiAgICBrZXk6IFwid2hpc3BlclwiLFxuXG4gICAgLyoqXHJcbiAgICAgKiBUcmlnZ2VyIGNsaWVudCBldmVudCBvbiB0aGUgY2hhbm5lbC5cclxuICAgICAqL1xuICAgIHZhbHVlOiBmdW5jdGlvbiB3aGlzcGVyKGV2ZW50TmFtZSwgZGF0YSkge1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIE51bGxQcml2YXRlQ2hhbm5lbDtcbn0oTnVsbENoYW5uZWwpO1xuXG4vKipcclxuICogVGhpcyBjbGFzcyByZXByZXNlbnRzIGEgbnVsbCBwcmVzZW5jZSBjaGFubmVsLlxyXG4gKi9cblxudmFyIE51bGxQcmVzZW5jZUNoYW5uZWwgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKF9OdWxsQ2hhbm5lbCkge1xuICBfaW5oZXJpdHMoTnVsbFByZXNlbmNlQ2hhbm5lbCwgX051bGxDaGFubmVsKTtcblxuICB2YXIgX3N1cGVyID0gX2NyZWF0ZVN1cGVyKE51bGxQcmVzZW5jZUNoYW5uZWwpO1xuXG4gIGZ1bmN0aW9uIE51bGxQcmVzZW5jZUNoYW5uZWwoKSB7XG4gICAgX2NsYXNzQ2FsbENoZWNrKHRoaXMsIE51bGxQcmVzZW5jZUNoYW5uZWwpO1xuXG4gICAgcmV0dXJuIF9zdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpO1xuICB9XG5cbiAgX2NyZWF0ZUNsYXNzKE51bGxQcmVzZW5jZUNoYW5uZWwsIFt7XG4gICAga2V5OiBcImhlcmVcIixcblxuICAgIC8qKlxyXG4gICAgICogUmVnaXN0ZXIgYSBjYWxsYmFjayB0byBiZSBjYWxsZWQgYW55dGltZSB0aGUgbWVtYmVyIGxpc3QgY2hhbmdlcy5cclxuICAgICAqL1xuICAgIHZhbHVlOiBmdW5jdGlvbiBoZXJlKGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBMaXN0ZW4gZm9yIHNvbWVvbmUgam9pbmluZyB0aGUgY2hhbm5lbC5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwiam9pbmluZ1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBqb2luaW5nKGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBMaXN0ZW4gZm9yIHNvbWVvbmUgbGVhdmluZyB0aGUgY2hhbm5lbC5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwibGVhdmluZ1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsZWF2aW5nKGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBUcmlnZ2VyIGNsaWVudCBldmVudCBvbiB0aGUgY2hhbm5lbC5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwid2hpc3BlclwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiB3aGlzcGVyKGV2ZW50TmFtZSwgZGF0YSkge1xuICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfVxuICB9XSk7XG5cbiAgcmV0dXJuIE51bGxQcmVzZW5jZUNoYW5uZWw7XG59KE51bGxDaGFubmVsKTtcblxuLyoqXHJcbiAqIFRoaXMgY2xhc3MgY3JlYXRlcyBhIGNvbm5lY3RvciB0byBQdXNoZXIuXHJcbiAqL1xuXG52YXIgUHVzaGVyQ29ubmVjdG9yID0gLyojX19QVVJFX18qL2Z1bmN0aW9uIChfQ29ubmVjdG9yKSB7XG4gIF9pbmhlcml0cyhQdXNoZXJDb25uZWN0b3IsIF9Db25uZWN0b3IpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoUHVzaGVyQ29ubmVjdG9yKTtcblxuICBmdW5jdGlvbiBQdXNoZXJDb25uZWN0b3IoKSB7XG4gICAgdmFyIF90aGlzO1xuXG4gICAgX2NsYXNzQ2FsbENoZWNrKHRoaXMsIFB1c2hlckNvbm5lY3Rvcik7XG5cbiAgICBfdGhpcyA9IF9zdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpO1xuICAgIC8qKlxyXG4gICAgICogQWxsIG9mIHRoZSBzdWJzY3JpYmVkIGNoYW5uZWwgbmFtZXMuXHJcbiAgICAgKi9cblxuICAgIF90aGlzLmNoYW5uZWxzID0ge307XG4gICAgcmV0dXJuIF90aGlzO1xuICB9XG4gIC8qKlxyXG4gICAqIENyZWF0ZSBhIGZyZXNoIFB1c2hlciBjb25uZWN0aW9uLlxyXG4gICAqL1xuXG5cbiAgX2NyZWF0ZUNsYXNzKFB1c2hlckNvbm5lY3RvciwgW3tcbiAgICBrZXk6IFwiY29ubmVjdFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBjb25uZWN0KCkge1xuICAgICAgaWYgKHR5cGVvZiB0aGlzLm9wdGlvbnMuY2xpZW50ICE9PSAndW5kZWZpbmVkJykge1xuICAgICAgICB0aGlzLnB1c2hlciA9IHRoaXMub3B0aW9ucy5jbGllbnQ7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICB0aGlzLnB1c2hlciA9IG5ldyBQdXNoZXIodGhpcy5vcHRpb25zLmtleSwgdGhpcy5vcHRpb25zKTtcbiAgICAgIH1cbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBMaXN0ZW4gZm9yIGFuIGV2ZW50IG9uIGEgY2hhbm5lbCBpbnN0YW5jZS5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwibGlzdGVuXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGxpc3RlbihuYW1lLCBldmVudCwgY2FsbGJhY2spIHtcbiAgICAgIHJldHVybiB0aGlzLmNoYW5uZWwobmFtZSkubGlzdGVuKGV2ZW50LCBjYWxsYmFjayk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogR2V0IGEgY2hhbm5lbCBpbnN0YW5jZSBieSBuYW1lLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJjaGFubmVsXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGNoYW5uZWwobmFtZSkge1xuICAgICAgaWYgKCF0aGlzLmNoYW5uZWxzW25hbWVdKSB7XG4gICAgICAgIHRoaXMuY2hhbm5lbHNbbmFtZV0gPSBuZXcgUHVzaGVyQ2hhbm5lbCh0aGlzLnB1c2hlciwgbmFtZSwgdGhpcy5vcHRpb25zKTtcbiAgICAgIH1cblxuICAgICAgcmV0dXJuIHRoaXMuY2hhbm5lbHNbbmFtZV07XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogR2V0IGEgcHJpdmF0ZSBjaGFubmVsIGluc3RhbmNlIGJ5IG5hbWUuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInByaXZhdGVDaGFubmVsXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHByaXZhdGVDaGFubmVsKG5hbWUpIHtcbiAgICAgIGlmICghdGhpcy5jaGFubmVsc1sncHJpdmF0ZS0nICsgbmFtZV0pIHtcbiAgICAgICAgdGhpcy5jaGFubmVsc1sncHJpdmF0ZS0nICsgbmFtZV0gPSBuZXcgUHVzaGVyUHJpdmF0ZUNoYW5uZWwodGhpcy5wdXNoZXIsICdwcml2YXRlLScgKyBuYW1lLCB0aGlzLm9wdGlvbnMpO1xuICAgICAgfVxuXG4gICAgICByZXR1cm4gdGhpcy5jaGFubmVsc1sncHJpdmF0ZS0nICsgbmFtZV07XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogR2V0IGEgcHJpdmF0ZSBlbmNyeXB0ZWQgY2hhbm5lbCBpbnN0YW5jZSBieSBuYW1lLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJlbmNyeXB0ZWRQcml2YXRlQ2hhbm5lbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBlbmNyeXB0ZWRQcml2YXRlQ2hhbm5lbChuYW1lKSB7XG4gICAgICBpZiAoIXRoaXMuY2hhbm5lbHNbJ3ByaXZhdGUtZW5jcnlwdGVkLScgKyBuYW1lXSkge1xuICAgICAgICB0aGlzLmNoYW5uZWxzWydwcml2YXRlLWVuY3J5cHRlZC0nICsgbmFtZV0gPSBuZXcgUHVzaGVyRW5jcnlwdGVkUHJpdmF0ZUNoYW5uZWwodGhpcy5wdXNoZXIsICdwcml2YXRlLWVuY3J5cHRlZC0nICsgbmFtZSwgdGhpcy5vcHRpb25zKTtcbiAgICAgIH1cblxuICAgICAgcmV0dXJuIHRoaXMuY2hhbm5lbHNbJ3ByaXZhdGUtZW5jcnlwdGVkLScgKyBuYW1lXTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBHZXQgYSBwcmVzZW5jZSBjaGFubmVsIGluc3RhbmNlIGJ5IG5hbWUuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInByZXNlbmNlQ2hhbm5lbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBwcmVzZW5jZUNoYW5uZWwobmFtZSkge1xuICAgICAgaWYgKCF0aGlzLmNoYW5uZWxzWydwcmVzZW5jZS0nICsgbmFtZV0pIHtcbiAgICAgICAgdGhpcy5jaGFubmVsc1sncHJlc2VuY2UtJyArIG5hbWVdID0gbmV3IFB1c2hlclByZXNlbmNlQ2hhbm5lbCh0aGlzLnB1c2hlciwgJ3ByZXNlbmNlLScgKyBuYW1lLCB0aGlzLm9wdGlvbnMpO1xuICAgICAgfVxuXG4gICAgICByZXR1cm4gdGhpcy5jaGFubmVsc1sncHJlc2VuY2UtJyArIG5hbWVdO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIExlYXZlIHRoZSBnaXZlbiBjaGFubmVsLCBhcyB3ZWxsIGFzIGl0cyBwcml2YXRlIGFuZCBwcmVzZW5jZSB2YXJpYW50cy5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwibGVhdmVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gbGVhdmUobmFtZSkge1xuICAgICAgdmFyIF90aGlzMiA9IHRoaXM7XG5cbiAgICAgIHZhciBjaGFubmVscyA9IFtuYW1lLCAncHJpdmF0ZS0nICsgbmFtZSwgJ3ByZXNlbmNlLScgKyBuYW1lXTtcbiAgICAgIGNoYW5uZWxzLmZvckVhY2goZnVuY3Rpb24gKG5hbWUsIGluZGV4KSB7XG4gICAgICAgIF90aGlzMi5sZWF2ZUNoYW5uZWwobmFtZSk7XG4gICAgICB9KTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBMZWF2ZSB0aGUgZ2l2ZW4gY2hhbm5lbC5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwibGVhdmVDaGFubmVsXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGxlYXZlQ2hhbm5lbChuYW1lKSB7XG4gICAgICBpZiAodGhpcy5jaGFubmVsc1tuYW1lXSkge1xuICAgICAgICB0aGlzLmNoYW5uZWxzW25hbWVdLnVuc3Vic2NyaWJlKCk7XG4gICAgICAgIGRlbGV0ZSB0aGlzLmNoYW5uZWxzW25hbWVdO1xuICAgICAgfVxuICAgIH1cbiAgICAvKipcclxuICAgICAqIEdldCB0aGUgc29ja2V0IElEIGZvciB0aGUgY29ubmVjdGlvbi5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwic29ja2V0SWRcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gc29ja2V0SWQoKSB7XG4gICAgICByZXR1cm4gdGhpcy5wdXNoZXIuY29ubmVjdGlvbi5zb2NrZXRfaWQ7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogRGlzY29ubmVjdCBQdXNoZXIgY29ubmVjdGlvbi5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwiZGlzY29ubmVjdFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBkaXNjb25uZWN0KCkge1xuICAgICAgdGhpcy5wdXNoZXIuZGlzY29ubmVjdCgpO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBQdXNoZXJDb25uZWN0b3I7XG59KENvbm5lY3Rvcik7XG5cbi8qKlxyXG4gKiBUaGlzIGNsYXNzIGNyZWF0ZXMgYSBjb25ubmVjdG9yIHRvIGEgU29ja2V0LmlvIHNlcnZlci5cclxuICovXG5cbnZhciBTb2NrZXRJb0Nvbm5lY3RvciA9IC8qI19fUFVSRV9fKi9mdW5jdGlvbiAoX0Nvbm5lY3Rvcikge1xuICBfaW5oZXJpdHMoU29ja2V0SW9Db25uZWN0b3IsIF9Db25uZWN0b3IpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoU29ja2V0SW9Db25uZWN0b3IpO1xuXG4gIGZ1bmN0aW9uIFNvY2tldElvQ29ubmVjdG9yKCkge1xuICAgIHZhciBfdGhpcztcblxuICAgIF9jbGFzc0NhbGxDaGVjayh0aGlzLCBTb2NrZXRJb0Nvbm5lY3Rvcik7XG5cbiAgICBfdGhpcyA9IF9zdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpO1xuICAgIC8qKlxyXG4gICAgICogQWxsIG9mIHRoZSBzdWJzY3JpYmVkIGNoYW5uZWwgbmFtZXMuXHJcbiAgICAgKi9cblxuICAgIF90aGlzLmNoYW5uZWxzID0ge307XG4gICAgcmV0dXJuIF90aGlzO1xuICB9XG4gIC8qKlxyXG4gICAqIENyZWF0ZSBhIGZyZXNoIFNvY2tldC5pbyBjb25uZWN0aW9uLlxyXG4gICAqL1xuXG5cbiAgX2NyZWF0ZUNsYXNzKFNvY2tldElvQ29ubmVjdG9yLCBbe1xuICAgIGtleTogXCJjb25uZWN0XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGNvbm5lY3QoKSB7XG4gICAgICB2YXIgX3RoaXMyID0gdGhpcztcblxuICAgICAgdmFyIGlvID0gdGhpcy5nZXRTb2NrZXRJTygpO1xuICAgICAgdGhpcy5zb2NrZXQgPSBpbyh0aGlzLm9wdGlvbnMuaG9zdCwgdGhpcy5vcHRpb25zKTtcbiAgICAgIHRoaXMuc29ja2V0Lm9uKCdyZWNvbm5lY3QnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIE9iamVjdC52YWx1ZXMoX3RoaXMyLmNoYW5uZWxzKS5mb3JFYWNoKGZ1bmN0aW9uIChjaGFubmVsKSB7XG4gICAgICAgICAgY2hhbm5lbC5zdWJzY3JpYmUoKTtcbiAgICAgICAgfSk7XG4gICAgICB9KTtcbiAgICAgIHJldHVybiB0aGlzLnNvY2tldDtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBHZXQgc29ja2V0LmlvIG1vZHVsZSBmcm9tIGdsb2JhbCBzY29wZSBvciBvcHRpb25zLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJnZXRTb2NrZXRJT1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBnZXRTb2NrZXRJTygpIHtcbiAgICAgIGlmICh0eXBlb2YgdGhpcy5vcHRpb25zLmNsaWVudCAhPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMub3B0aW9ucy5jbGllbnQ7XG4gICAgICB9XG5cbiAgICAgIGlmICh0eXBlb2YgaW8gIT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgIHJldHVybiBpbztcbiAgICAgIH1cblxuICAgICAgdGhyb3cgbmV3IEVycm9yKCdTb2NrZXQuaW8gY2xpZW50IG5vdCBmb3VuZC4gU2hvdWxkIGJlIGdsb2JhbGx5IGF2YWlsYWJsZSBvciBwYXNzZWQgdmlhIG9wdGlvbnMuY2xpZW50Jyk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogTGlzdGVuIGZvciBhbiBldmVudCBvbiBhIGNoYW5uZWwgaW5zdGFuY2UuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImxpc3RlblwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsaXN0ZW4obmFtZSwgZXZlbnQsIGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gdGhpcy5jaGFubmVsKG5hbWUpLmxpc3RlbihldmVudCwgY2FsbGJhY2spO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIEdldCBhIGNoYW5uZWwgaW5zdGFuY2UgYnkgbmFtZS5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwiY2hhbm5lbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBjaGFubmVsKG5hbWUpIHtcbiAgICAgIGlmICghdGhpcy5jaGFubmVsc1tuYW1lXSkge1xuICAgICAgICB0aGlzLmNoYW5uZWxzW25hbWVdID0gbmV3IFNvY2tldElvQ2hhbm5lbCh0aGlzLnNvY2tldCwgbmFtZSwgdGhpcy5vcHRpb25zKTtcbiAgICAgIH1cblxuICAgICAgcmV0dXJuIHRoaXMuY2hhbm5lbHNbbmFtZV07XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogR2V0IGEgcHJpdmF0ZSBjaGFubmVsIGluc3RhbmNlIGJ5IG5hbWUuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInByaXZhdGVDaGFubmVsXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHByaXZhdGVDaGFubmVsKG5hbWUpIHtcbiAgICAgIGlmICghdGhpcy5jaGFubmVsc1sncHJpdmF0ZS0nICsgbmFtZV0pIHtcbiAgICAgICAgdGhpcy5jaGFubmVsc1sncHJpdmF0ZS0nICsgbmFtZV0gPSBuZXcgU29ja2V0SW9Qcml2YXRlQ2hhbm5lbCh0aGlzLnNvY2tldCwgJ3ByaXZhdGUtJyArIG5hbWUsIHRoaXMub3B0aW9ucyk7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiB0aGlzLmNoYW5uZWxzWydwcml2YXRlLScgKyBuYW1lXTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBHZXQgYSBwcmVzZW5jZSBjaGFubmVsIGluc3RhbmNlIGJ5IG5hbWUuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInByZXNlbmNlQ2hhbm5lbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBwcmVzZW5jZUNoYW5uZWwobmFtZSkge1xuICAgICAgaWYgKCF0aGlzLmNoYW5uZWxzWydwcmVzZW5jZS0nICsgbmFtZV0pIHtcbiAgICAgICAgdGhpcy5jaGFubmVsc1sncHJlc2VuY2UtJyArIG5hbWVdID0gbmV3IFNvY2tldElvUHJlc2VuY2VDaGFubmVsKHRoaXMuc29ja2V0LCAncHJlc2VuY2UtJyArIG5hbWUsIHRoaXMub3B0aW9ucyk7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiB0aGlzLmNoYW5uZWxzWydwcmVzZW5jZS0nICsgbmFtZV07XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogTGVhdmUgdGhlIGdpdmVuIGNoYW5uZWwsIGFzIHdlbGwgYXMgaXRzIHByaXZhdGUgYW5kIHByZXNlbmNlIHZhcmlhbnRzLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJsZWF2ZVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsZWF2ZShuYW1lKSB7XG4gICAgICB2YXIgX3RoaXMzID0gdGhpcztcblxuICAgICAgdmFyIGNoYW5uZWxzID0gW25hbWUsICdwcml2YXRlLScgKyBuYW1lLCAncHJlc2VuY2UtJyArIG5hbWVdO1xuICAgICAgY2hhbm5lbHMuZm9yRWFjaChmdW5jdGlvbiAobmFtZSkge1xuICAgICAgICBfdGhpczMubGVhdmVDaGFubmVsKG5hbWUpO1xuICAgICAgfSk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogTGVhdmUgdGhlIGdpdmVuIGNoYW5uZWwuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImxlYXZlQ2hhbm5lbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsZWF2ZUNoYW5uZWwobmFtZSkge1xuICAgICAgaWYgKHRoaXMuY2hhbm5lbHNbbmFtZV0pIHtcbiAgICAgICAgdGhpcy5jaGFubmVsc1tuYW1lXS51bnN1YnNjcmliZSgpO1xuICAgICAgICBkZWxldGUgdGhpcy5jaGFubmVsc1tuYW1lXTtcbiAgICAgIH1cbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBHZXQgdGhlIHNvY2tldCBJRCBmb3IgdGhlIGNvbm5lY3Rpb24uXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInNvY2tldElkXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHNvY2tldElkKCkge1xuICAgICAgcmV0dXJuIHRoaXMuc29ja2V0LmlkO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIERpc2Nvbm5lY3QgU29ja2V0aW8gY29ubmVjdGlvbi5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwiZGlzY29ubmVjdFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBkaXNjb25uZWN0KCkge1xuICAgICAgdGhpcy5zb2NrZXQuZGlzY29ubmVjdCgpO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBTb2NrZXRJb0Nvbm5lY3Rvcjtcbn0oQ29ubmVjdG9yKTtcblxuLyoqXHJcbiAqIFRoaXMgY2xhc3MgY3JlYXRlcyBhIG51bGwgY29ubmVjdG9yLlxyXG4gKi9cblxudmFyIE51bGxDb25uZWN0b3IgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKF9Db25uZWN0b3IpIHtcbiAgX2luaGVyaXRzKE51bGxDb25uZWN0b3IsIF9Db25uZWN0b3IpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoTnVsbENvbm5lY3Rvcik7XG5cbiAgZnVuY3Rpb24gTnVsbENvbm5lY3RvcigpIHtcbiAgICB2YXIgX3RoaXM7XG5cbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgTnVsbENvbm5lY3Rvcik7XG5cbiAgICBfdGhpcyA9IF9zdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpO1xuICAgIC8qKlxyXG4gICAgICogQWxsIG9mIHRoZSBzdWJzY3JpYmVkIGNoYW5uZWwgbmFtZXMuXHJcbiAgICAgKi9cblxuICAgIF90aGlzLmNoYW5uZWxzID0ge307XG4gICAgcmV0dXJuIF90aGlzO1xuICB9XG4gIC8qKlxyXG4gICAqIENyZWF0ZSBhIGZyZXNoIGNvbm5lY3Rpb24uXHJcbiAgICovXG5cblxuICBfY3JlYXRlQ2xhc3MoTnVsbENvbm5lY3RvciwgW3tcbiAgICBrZXk6IFwiY29ubmVjdFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBjb25uZWN0KCkge30gLy9cblxuICAgIC8qKlxyXG4gICAgICogTGlzdGVuIGZvciBhbiBldmVudCBvbiBhIGNoYW5uZWwgaW5zdGFuY2UuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImxpc3RlblwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsaXN0ZW4obmFtZSwgZXZlbnQsIGNhbGxiYWNrKSB7XG4gICAgICByZXR1cm4gbmV3IE51bGxDaGFubmVsKCk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogR2V0IGEgY2hhbm5lbCBpbnN0YW5jZSBieSBuYW1lLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJjaGFubmVsXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGNoYW5uZWwobmFtZSkge1xuICAgICAgcmV0dXJuIG5ldyBOdWxsQ2hhbm5lbCgpO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIEdldCBhIHByaXZhdGUgY2hhbm5lbCBpbnN0YW5jZSBieSBuYW1lLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJwcml2YXRlQ2hhbm5lbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBwcml2YXRlQ2hhbm5lbChuYW1lKSB7XG4gICAgICByZXR1cm4gbmV3IE51bGxQcml2YXRlQ2hhbm5lbCgpO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIEdldCBhIHByZXNlbmNlIGNoYW5uZWwgaW5zdGFuY2UgYnkgbmFtZS5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwicHJlc2VuY2VDaGFubmVsXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHByZXNlbmNlQ2hhbm5lbChuYW1lKSB7XG4gICAgICByZXR1cm4gbmV3IE51bGxQcmVzZW5jZUNoYW5uZWwoKTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBMZWF2ZSB0aGUgZ2l2ZW4gY2hhbm5lbCwgYXMgd2VsbCBhcyBpdHMgcHJpdmF0ZSBhbmQgcHJlc2VuY2UgdmFyaWFudHMuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImxlYXZlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGxlYXZlKG5hbWUpIHt9IC8vXG5cbiAgICAvKipcclxuICAgICAqIExlYXZlIHRoZSBnaXZlbiBjaGFubmVsLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJsZWF2ZUNoYW5uZWxcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gbGVhdmVDaGFubmVsKG5hbWUpIHt9IC8vXG5cbiAgICAvKipcclxuICAgICAqIEdldCB0aGUgc29ja2V0IElEIGZvciB0aGUgY29ubmVjdGlvbi5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwic29ja2V0SWRcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gc29ja2V0SWQoKSB7XG4gICAgICByZXR1cm4gJ2Zha2Utc29ja2V0LWlkJztcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBEaXNjb25uZWN0IHRoZSBjb25uZWN0aW9uLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJkaXNjb25uZWN0XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGRpc2Nvbm5lY3QoKSB7Ly9cbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gTnVsbENvbm5lY3Rvcjtcbn0oQ29ubmVjdG9yKTtcblxuLyoqXHJcbiAqIFRoaXMgY2xhc3MgaXMgdGhlIHByaW1hcnkgQVBJIGZvciBpbnRlcmFjdGluZyB3aXRoIGJyb2FkY2FzdGluZy5cclxuICovXG5cbnZhciBFY2hvID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgLyoqXHJcbiAgICogQ3JlYXRlIGEgbmV3IGNsYXNzIGluc3RhbmNlLlxyXG4gICAqL1xuICBmdW5jdGlvbiBFY2hvKG9wdGlvbnMpIHtcbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgRWNobyk7XG5cbiAgICB0aGlzLm9wdGlvbnMgPSBvcHRpb25zO1xuICAgIHRoaXMuY29ubmVjdCgpO1xuXG4gICAgaWYgKCF0aGlzLm9wdGlvbnMud2l0aG91dEludGVyY2VwdG9ycykge1xuICAgICAgdGhpcy5yZWdpc3RlckludGVyY2VwdG9ycygpO1xuICAgIH1cbiAgfVxuICAvKipcclxuICAgKiBHZXQgYSBjaGFubmVsIGluc3RhbmNlIGJ5IG5hbWUuXHJcbiAgICovXG5cblxuICBfY3JlYXRlQ2xhc3MoRWNobywgW3tcbiAgICBrZXk6IFwiY2hhbm5lbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBjaGFubmVsKF9jaGFubmVsKSB7XG4gICAgICByZXR1cm4gdGhpcy5jb25uZWN0b3IuY2hhbm5lbChfY2hhbm5lbCk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogQ3JlYXRlIGEgbmV3IGNvbm5lY3Rpb24uXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImNvbm5lY3RcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gY29ubmVjdCgpIHtcbiAgICAgIGlmICh0aGlzLm9wdGlvbnMuYnJvYWRjYXN0ZXIgPT0gJ3B1c2hlcicpIHtcbiAgICAgICAgdGhpcy5jb25uZWN0b3IgPSBuZXcgUHVzaGVyQ29ubmVjdG9yKHRoaXMub3B0aW9ucyk7XG4gICAgICB9IGVsc2UgaWYgKHRoaXMub3B0aW9ucy5icm9hZGNhc3RlciA9PSAnc29ja2V0LmlvJykge1xuICAgICAgICB0aGlzLmNvbm5lY3RvciA9IG5ldyBTb2NrZXRJb0Nvbm5lY3Rvcih0aGlzLm9wdGlvbnMpO1xuICAgICAgfSBlbHNlIGlmICh0aGlzLm9wdGlvbnMuYnJvYWRjYXN0ZXIgPT0gJ251bGwnKSB7XG4gICAgICAgIHRoaXMuY29ubmVjdG9yID0gbmV3IE51bGxDb25uZWN0b3IodGhpcy5vcHRpb25zKTtcbiAgICAgIH0gZWxzZSBpZiAodHlwZW9mIHRoaXMub3B0aW9ucy5icm9hZGNhc3RlciA9PSAnZnVuY3Rpb24nKSB7XG4gICAgICAgIHRoaXMuY29ubmVjdG9yID0gbmV3IHRoaXMub3B0aW9ucy5icm9hZGNhc3Rlcih0aGlzLm9wdGlvbnMpO1xuICAgICAgfVxuICAgIH1cbiAgICAvKipcclxuICAgICAqIERpc2Nvbm5lY3QgZnJvbSB0aGUgRWNobyBzZXJ2ZXIuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImRpc2Nvbm5lY3RcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZGlzY29ubmVjdCgpIHtcbiAgICAgIHRoaXMuY29ubmVjdG9yLmRpc2Nvbm5lY3QoKTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBHZXQgYSBwcmVzZW5jZSBjaGFubmVsIGluc3RhbmNlIGJ5IG5hbWUuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImpvaW5cIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gam9pbihjaGFubmVsKSB7XG4gICAgICByZXR1cm4gdGhpcy5jb25uZWN0b3IucHJlc2VuY2VDaGFubmVsKGNoYW5uZWwpO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIExlYXZlIHRoZSBnaXZlbiBjaGFubmVsLCBhcyB3ZWxsIGFzIGl0cyBwcml2YXRlIGFuZCBwcmVzZW5jZSB2YXJpYW50cy5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwibGVhdmVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gbGVhdmUoY2hhbm5lbCkge1xuICAgICAgdGhpcy5jb25uZWN0b3IubGVhdmUoY2hhbm5lbCk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogTGVhdmUgdGhlIGdpdmVuIGNoYW5uZWwuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImxlYXZlQ2hhbm5lbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBsZWF2ZUNoYW5uZWwoY2hhbm5lbCkge1xuICAgICAgdGhpcy5jb25uZWN0b3IubGVhdmVDaGFubmVsKGNoYW5uZWwpO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIExpc3RlbiBmb3IgYW4gZXZlbnQgb24gYSBjaGFubmVsIGluc3RhbmNlLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJsaXN0ZW5cIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gbGlzdGVuKGNoYW5uZWwsIGV2ZW50LCBjYWxsYmFjaykge1xuICAgICAgcmV0dXJuIHRoaXMuY29ubmVjdG9yLmxpc3RlbihjaGFubmVsLCBldmVudCwgY2FsbGJhY2spO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIEdldCBhIHByaXZhdGUgY2hhbm5lbCBpbnN0YW5jZSBieSBuYW1lLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJwcml2YXRlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIF9wcml2YXRlKGNoYW5uZWwpIHtcbiAgICAgIHJldHVybiB0aGlzLmNvbm5lY3Rvci5wcml2YXRlQ2hhbm5lbChjaGFubmVsKTtcbiAgICB9XG4gICAgLyoqXHJcbiAgICAgKiBHZXQgYSBwcml2YXRlIGVuY3J5cHRlZCBjaGFubmVsIGluc3RhbmNlIGJ5IG5hbWUuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcImVuY3J5cHRlZFByaXZhdGVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZW5jcnlwdGVkUHJpdmF0ZShjaGFubmVsKSB7XG4gICAgICByZXR1cm4gdGhpcy5jb25uZWN0b3IuZW5jcnlwdGVkUHJpdmF0ZUNoYW5uZWwoY2hhbm5lbCk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogR2V0IHRoZSBTb2NrZXQgSUQgZm9yIHRoZSBjb25uZWN0aW9uLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJzb2NrZXRJZFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBzb2NrZXRJZCgpIHtcbiAgICAgIHJldHVybiB0aGlzLmNvbm5lY3Rvci5zb2NrZXRJZCgpO1xuICAgIH1cbiAgICAvKipcclxuICAgICAqIFJlZ2lzdGVyIDNyZCBwYXJ0eSByZXF1ZXN0IGludGVyY2VwdGlvcnMuIFRoZXNlIGFyZSB1c2VkIHRvIGF1dG9tYXRpY2FsbHlcclxuICAgICAqIHNlbmQgYSBjb25uZWN0aW9ucyBzb2NrZXQgaWQgdG8gYSBMYXJhdmVsIGFwcCB3aXRoIGEgWC1Tb2NrZXQtSWQgaGVhZGVyLlxyXG4gICAgICovXG5cbiAgfSwge1xuICAgIGtleTogXCJyZWdpc3RlckludGVyY2VwdG9yc1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiByZWdpc3RlckludGVyY2VwdG9ycygpIHtcbiAgICAgIGlmICh0eXBlb2YgVnVlID09PSAnZnVuY3Rpb24nICYmIFZ1ZS5odHRwKSB7XG4gICAgICAgIHRoaXMucmVnaXN0ZXJWdWVSZXF1ZXN0SW50ZXJjZXB0b3IoKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHR5cGVvZiBheGlvcyA9PT0gJ2Z1bmN0aW9uJykge1xuICAgICAgICB0aGlzLnJlZ2lzdGVyQXhpb3NSZXF1ZXN0SW50ZXJjZXB0b3IoKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHR5cGVvZiBqUXVlcnkgPT09ICdmdW5jdGlvbicpIHtcbiAgICAgICAgdGhpcy5yZWdpc3RlcmpRdWVyeUFqYXhTZXR1cCgpO1xuICAgICAgfVxuICAgIH1cbiAgICAvKipcclxuICAgICAqIFJlZ2lzdGVyIGEgVnVlIEhUVFAgaW50ZXJjZXB0b3IgdG8gYWRkIHRoZSBYLVNvY2tldC1JRCBoZWFkZXIuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInJlZ2lzdGVyVnVlUmVxdWVzdEludGVyY2VwdG9yXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHJlZ2lzdGVyVnVlUmVxdWVzdEludGVyY2VwdG9yKCkge1xuICAgICAgdmFyIF90aGlzID0gdGhpcztcblxuICAgICAgVnVlLmh0dHAuaW50ZXJjZXB0b3JzLnB1c2goZnVuY3Rpb24gKHJlcXVlc3QsIG5leHQpIHtcbiAgICAgICAgaWYgKF90aGlzLnNvY2tldElkKCkpIHtcbiAgICAgICAgICByZXF1ZXN0LmhlYWRlcnMuc2V0KCdYLVNvY2tldC1JRCcsIF90aGlzLnNvY2tldElkKCkpO1xuICAgICAgICB9XG5cbiAgICAgICAgbmV4dCgpO1xuICAgICAgfSk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogUmVnaXN0ZXIgYW4gQXhpb3MgSFRUUCBpbnRlcmNlcHRvciB0byBhZGQgdGhlIFgtU29ja2V0LUlEIGhlYWRlci5cclxuICAgICAqL1xuXG4gIH0sIHtcbiAgICBrZXk6IFwicmVnaXN0ZXJBeGlvc1JlcXVlc3RJbnRlcmNlcHRvclwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiByZWdpc3RlckF4aW9zUmVxdWVzdEludGVyY2VwdG9yKCkge1xuICAgICAgdmFyIF90aGlzMiA9IHRoaXM7XG5cbiAgICAgIGF4aW9zLmludGVyY2VwdG9ycy5yZXF1ZXN0LnVzZShmdW5jdGlvbiAoY29uZmlnKSB7XG4gICAgICAgIGlmIChfdGhpczIuc29ja2V0SWQoKSkge1xuICAgICAgICAgIGNvbmZpZy5oZWFkZXJzWydYLVNvY2tldC1JZCddID0gX3RoaXMyLnNvY2tldElkKCk7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4gY29uZmlnO1xuICAgICAgfSk7XG4gICAgfVxuICAgIC8qKlxyXG4gICAgICogUmVnaXN0ZXIgalF1ZXJ5IEFqYXhQcmVmaWx0ZXIgdG8gYWRkIHRoZSBYLVNvY2tldC1JRCBoZWFkZXIuXHJcbiAgICAgKi9cblxuICB9LCB7XG4gICAga2V5OiBcInJlZ2lzdGVyalF1ZXJ5QWpheFNldHVwXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHJlZ2lzdGVyalF1ZXJ5QWpheFNldHVwKCkge1xuICAgICAgdmFyIF90aGlzMyA9IHRoaXM7XG5cbiAgICAgIGlmICh0eXBlb2YgalF1ZXJ5LmFqYXggIT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgalF1ZXJ5LmFqYXhQcmVmaWx0ZXIoZnVuY3Rpb24gKG9wdGlvbnMsIG9yaWdpbmFsT3B0aW9ucywgeGhyKSB7XG4gICAgICAgICAgaWYgKF90aGlzMy5zb2NrZXRJZCgpKSB7XG4gICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1Tb2NrZXQtSWQnLCBfdGhpczMuc29ja2V0SWQoKSk7XG4gICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICAgIH1cbiAgICB9XG4gIH1dKTtcblxuICByZXR1cm4gRWNobztcbn0oKTtcblxuZXhwb3J0IGRlZmF1bHQgRWNobztcbiIsIi8vIHNoaW0gZm9yIHVzaW5nIHByb2Nlc3MgaW4gYnJvd3NlclxudmFyIHByb2Nlc3MgPSBtb2R1bGUuZXhwb3J0cyA9IHt9O1xuXG4vLyBjYWNoZWQgZnJvbSB3aGF0ZXZlciBnbG9iYWwgaXMgcHJlc2VudCBzbyB0aGF0IHRlc3QgcnVubmVycyB0aGF0IHN0dWIgaXRcbi8vIGRvbid0IGJyZWFrIHRoaW5ncy4gIEJ1dCB3ZSBuZWVkIHRvIHdyYXAgaXQgaW4gYSB0cnkgY2F0Y2ggaW4gY2FzZSBpdCBpc1xuLy8gd3JhcHBlZCBpbiBzdHJpY3QgbW9kZSBjb2RlIHdoaWNoIGRvZXNuJ3QgZGVmaW5lIGFueSBnbG9iYWxzLiAgSXQncyBpbnNpZGUgYVxuLy8gZnVuY3Rpb24gYmVjYXVzZSB0cnkvY2F0Y2hlcyBkZW9wdGltaXplIGluIGNlcnRhaW4gZW5naW5lcy5cblxudmFyIGNhY2hlZFNldFRpbWVvdXQ7XG52YXIgY2FjaGVkQ2xlYXJUaW1lb3V0O1xuXG5mdW5jdGlvbiBkZWZhdWx0U2V0VGltb3V0KCkge1xuICAgIHRocm93IG5ldyBFcnJvcignc2V0VGltZW91dCBoYXMgbm90IGJlZW4gZGVmaW5lZCcpO1xufVxuZnVuY3Rpb24gZGVmYXVsdENsZWFyVGltZW91dCAoKSB7XG4gICAgdGhyb3cgbmV3IEVycm9yKCdjbGVhclRpbWVvdXQgaGFzIG5vdCBiZWVuIGRlZmluZWQnKTtcbn1cbihmdW5jdGlvbiAoKSB7XG4gICAgdHJ5IHtcbiAgICAgICAgaWYgKHR5cGVvZiBzZXRUaW1lb3V0ID09PSAnZnVuY3Rpb24nKSB7XG4gICAgICAgICAgICBjYWNoZWRTZXRUaW1lb3V0ID0gc2V0VGltZW91dDtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIGNhY2hlZFNldFRpbWVvdXQgPSBkZWZhdWx0U2V0VGltb3V0O1xuICAgICAgICB9XG4gICAgfSBjYXRjaCAoZSkge1xuICAgICAgICBjYWNoZWRTZXRUaW1lb3V0ID0gZGVmYXVsdFNldFRpbW91dDtcbiAgICB9XG4gICAgdHJ5IHtcbiAgICAgICAgaWYgKHR5cGVvZiBjbGVhclRpbWVvdXQgPT09ICdmdW5jdGlvbicpIHtcbiAgICAgICAgICAgIGNhY2hlZENsZWFyVGltZW91dCA9IGNsZWFyVGltZW91dDtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIGNhY2hlZENsZWFyVGltZW91dCA9IGRlZmF1bHRDbGVhclRpbWVvdXQ7XG4gICAgICAgIH1cbiAgICB9IGNhdGNoIChlKSB7XG4gICAgICAgIGNhY2hlZENsZWFyVGltZW91dCA9IGRlZmF1bHRDbGVhclRpbWVvdXQ7XG4gICAgfVxufSAoKSlcbmZ1bmN0aW9uIHJ1blRpbWVvdXQoZnVuKSB7XG4gICAgaWYgKGNhY2hlZFNldFRpbWVvdXQgPT09IHNldFRpbWVvdXQpIHtcbiAgICAgICAgLy9ub3JtYWwgZW52aXJvbWVudHMgaW4gc2FuZSBzaXR1YXRpb25zXG4gICAgICAgIHJldHVybiBzZXRUaW1lb3V0KGZ1biwgMCk7XG4gICAgfVxuICAgIC8vIGlmIHNldFRpbWVvdXQgd2Fzbid0IGF2YWlsYWJsZSBidXQgd2FzIGxhdHRlciBkZWZpbmVkXG4gICAgaWYgKChjYWNoZWRTZXRUaW1lb3V0ID09PSBkZWZhdWx0U2V0VGltb3V0IHx8ICFjYWNoZWRTZXRUaW1lb3V0KSAmJiBzZXRUaW1lb3V0KSB7XG4gICAgICAgIGNhY2hlZFNldFRpbWVvdXQgPSBzZXRUaW1lb3V0O1xuICAgICAgICByZXR1cm4gc2V0VGltZW91dChmdW4sIDApO1xuICAgIH1cbiAgICB0cnkge1xuICAgICAgICAvLyB3aGVuIHdoZW4gc29tZWJvZHkgaGFzIHNjcmV3ZWQgd2l0aCBzZXRUaW1lb3V0IGJ1dCBubyBJLkUuIG1hZGRuZXNzXG4gICAgICAgIHJldHVybiBjYWNoZWRTZXRUaW1lb3V0KGZ1biwgMCk7XG4gICAgfSBjYXRjaChlKXtcbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgIC8vIFdoZW4gd2UgYXJlIGluIEkuRS4gYnV0IHRoZSBzY3JpcHQgaGFzIGJlZW4gZXZhbGVkIHNvIEkuRS4gZG9lc24ndCB0cnVzdCB0aGUgZ2xvYmFsIG9iamVjdCB3aGVuIGNhbGxlZCBub3JtYWxseVxuICAgICAgICAgICAgcmV0dXJuIGNhY2hlZFNldFRpbWVvdXQuY2FsbChudWxsLCBmdW4sIDApO1xuICAgICAgICB9IGNhdGNoKGUpe1xuICAgICAgICAgICAgLy8gc2FtZSBhcyBhYm92ZSBidXQgd2hlbiBpdCdzIGEgdmVyc2lvbiBvZiBJLkUuIHRoYXQgbXVzdCBoYXZlIHRoZSBnbG9iYWwgb2JqZWN0IGZvciAndGhpcycsIGhvcGZ1bGx5IG91ciBjb250ZXh0IGNvcnJlY3Qgb3RoZXJ3aXNlIGl0IHdpbGwgdGhyb3cgYSBnbG9iYWwgZXJyb3JcbiAgICAgICAgICAgIHJldHVybiBjYWNoZWRTZXRUaW1lb3V0LmNhbGwodGhpcywgZnVuLCAwKTtcbiAgICAgICAgfVxuICAgIH1cblxuXG59XG5mdW5jdGlvbiBydW5DbGVhclRpbWVvdXQobWFya2VyKSB7XG4gICAgaWYgKGNhY2hlZENsZWFyVGltZW91dCA9PT0gY2xlYXJUaW1lb3V0KSB7XG4gICAgICAgIC8vbm9ybWFsIGVudmlyb21lbnRzIGluIHNhbmUgc2l0dWF0aW9uc1xuICAgICAgICByZXR1cm4gY2xlYXJUaW1lb3V0KG1hcmtlcik7XG4gICAgfVxuICAgIC8vIGlmIGNsZWFyVGltZW91dCB3YXNuJ3QgYXZhaWxhYmxlIGJ1dCB3YXMgbGF0dGVyIGRlZmluZWRcbiAgICBpZiAoKGNhY2hlZENsZWFyVGltZW91dCA9PT0gZGVmYXVsdENsZWFyVGltZW91dCB8fCAhY2FjaGVkQ2xlYXJUaW1lb3V0KSAmJiBjbGVhclRpbWVvdXQpIHtcbiAgICAgICAgY2FjaGVkQ2xlYXJUaW1lb3V0ID0gY2xlYXJUaW1lb3V0O1xuICAgICAgICByZXR1cm4gY2xlYXJUaW1lb3V0KG1hcmtlcik7XG4gICAgfVxuICAgIHRyeSB7XG4gICAgICAgIC8vIHdoZW4gd2hlbiBzb21lYm9keSBoYXMgc2NyZXdlZCB3aXRoIHNldFRpbWVvdXQgYnV0IG5vIEkuRS4gbWFkZG5lc3NcbiAgICAgICAgcmV0dXJuIGNhY2hlZENsZWFyVGltZW91dChtYXJrZXIpO1xuICAgIH0gY2F0Y2ggKGUpe1xuICAgICAgICB0cnkge1xuICAgICAgICAgICAgLy8gV2hlbiB3ZSBhcmUgaW4gSS5FLiBidXQgdGhlIHNjcmlwdCBoYXMgYmVlbiBldmFsZWQgc28gSS5FLiBkb2Vzbid0ICB0cnVzdCB0aGUgZ2xvYmFsIG9iamVjdCB3aGVuIGNhbGxlZCBub3JtYWxseVxuICAgICAgICAgICAgcmV0dXJuIGNhY2hlZENsZWFyVGltZW91dC5jYWxsKG51bGwsIG1hcmtlcik7XG4gICAgICAgIH0gY2F0Y2ggKGUpe1xuICAgICAgICAgICAgLy8gc2FtZSBhcyBhYm92ZSBidXQgd2hlbiBpdCdzIGEgdmVyc2lvbiBvZiBJLkUuIHRoYXQgbXVzdCBoYXZlIHRoZSBnbG9iYWwgb2JqZWN0IGZvciAndGhpcycsIGhvcGZ1bGx5IG91ciBjb250ZXh0IGNvcnJlY3Qgb3RoZXJ3aXNlIGl0IHdpbGwgdGhyb3cgYSBnbG9iYWwgZXJyb3IuXG4gICAgICAgICAgICAvLyBTb21lIHZlcnNpb25zIG9mIEkuRS4gaGF2ZSBkaWZmZXJlbnQgcnVsZXMgZm9yIGNsZWFyVGltZW91dCB2cyBzZXRUaW1lb3V0XG4gICAgICAgICAgICByZXR1cm4gY2FjaGVkQ2xlYXJUaW1lb3V0LmNhbGwodGhpcywgbWFya2VyKTtcbiAgICAgICAgfVxuICAgIH1cblxuXG5cbn1cbnZhciBxdWV1ZSA9IFtdO1xudmFyIGRyYWluaW5nID0gZmFsc2U7XG52YXIgY3VycmVudFF1ZXVlO1xudmFyIHF1ZXVlSW5kZXggPSAtMTtcblxuZnVuY3Rpb24gY2xlYW5VcE5leHRUaWNrKCkge1xuICAgIGlmICghZHJhaW5pbmcgfHwgIWN1cnJlbnRRdWV1ZSkge1xuICAgICAgICByZXR1cm47XG4gICAgfVxuICAgIGRyYWluaW5nID0gZmFsc2U7XG4gICAgaWYgKGN1cnJlbnRRdWV1ZS5sZW5ndGgpIHtcbiAgICAgICAgcXVldWUgPSBjdXJyZW50UXVldWUuY29uY2F0KHF1ZXVlKTtcbiAgICB9IGVsc2Uge1xuICAgICAgICBxdWV1ZUluZGV4ID0gLTE7XG4gICAgfVxuICAgIGlmIChxdWV1ZS5sZW5ndGgpIHtcbiAgICAgICAgZHJhaW5RdWV1ZSgpO1xuICAgIH1cbn1cblxuZnVuY3Rpb24gZHJhaW5RdWV1ZSgpIHtcbiAgICBpZiAoZHJhaW5pbmcpIHtcbiAgICAgICAgcmV0dXJuO1xuICAgIH1cbiAgICB2YXIgdGltZW91dCA9IHJ1blRpbWVvdXQoY2xlYW5VcE5leHRUaWNrKTtcbiAgICBkcmFpbmluZyA9IHRydWU7XG5cbiAgICB2YXIgbGVuID0gcXVldWUubGVuZ3RoO1xuICAgIHdoaWxlKGxlbikge1xuICAgICAgICBjdXJyZW50UXVldWUgPSBxdWV1ZTtcbiAgICAgICAgcXVldWUgPSBbXTtcbiAgICAgICAgd2hpbGUgKCsrcXVldWVJbmRleCA8IGxlbikge1xuICAgICAgICAgICAgaWYgKGN1cnJlbnRRdWV1ZSkge1xuICAgICAgICAgICAgICAgIGN1cnJlbnRRdWV1ZVtxdWV1ZUluZGV4XS5ydW4oKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgICBxdWV1ZUluZGV4ID0gLTE7XG4gICAgICAgIGxlbiA9IHF1ZXVlLmxlbmd0aDtcbiAgICB9XG4gICAgY3VycmVudFF1ZXVlID0gbnVsbDtcbiAgICBkcmFpbmluZyA9IGZhbHNlO1xuICAgIHJ1bkNsZWFyVGltZW91dCh0aW1lb3V0KTtcbn1cblxucHJvY2Vzcy5uZXh0VGljayA9IGZ1bmN0aW9uIChmdW4pIHtcbiAgICB2YXIgYXJncyA9IG5ldyBBcnJheShhcmd1bWVudHMubGVuZ3RoIC0gMSk7XG4gICAgaWYgKGFyZ3VtZW50cy5sZW5ndGggPiAxKSB7XG4gICAgICAgIGZvciAodmFyIGkgPSAxOyBpIDwgYXJndW1lbnRzLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICBhcmdzW2kgLSAxXSA9IGFyZ3VtZW50c1tpXTtcbiAgICAgICAgfVxuICAgIH1cbiAgICBxdWV1ZS5wdXNoKG5ldyBJdGVtKGZ1biwgYXJncykpO1xuICAgIGlmIChxdWV1ZS5sZW5ndGggPT09IDEgJiYgIWRyYWluaW5nKSB7XG4gICAgICAgIHJ1blRpbWVvdXQoZHJhaW5RdWV1ZSk7XG4gICAgfVxufTtcblxuLy8gdjggbGlrZXMgcHJlZGljdGlibGUgb2JqZWN0c1xuZnVuY3Rpb24gSXRlbShmdW4sIGFycmF5KSB7XG4gICAgdGhpcy5mdW4gPSBmdW47XG4gICAgdGhpcy5hcnJheSA9IGFycmF5O1xufVxuSXRlbS5wcm90b3R5cGUucnVuID0gZnVuY3Rpb24gKCkge1xuICAgIHRoaXMuZnVuLmFwcGx5KG51bGwsIHRoaXMuYXJyYXkpO1xufTtcbnByb2Nlc3MudGl0bGUgPSAnYnJvd3Nlcic7XG5wcm9jZXNzLmJyb3dzZXIgPSB0cnVlO1xucHJvY2Vzcy5lbnYgPSB7fTtcbnByb2Nlc3MuYXJndiA9IFtdO1xucHJvY2Vzcy52ZXJzaW9uID0gJyc7IC8vIGVtcHR5IHN0cmluZyB0byBhdm9pZCByZWdleHAgaXNzdWVzXG5wcm9jZXNzLnZlcnNpb25zID0ge307XG5cbmZ1bmN0aW9uIG5vb3AoKSB7fVxuXG5wcm9jZXNzLm9uID0gbm9vcDtcbnByb2Nlc3MuYWRkTGlzdGVuZXIgPSBub29wO1xucHJvY2Vzcy5vbmNlID0gbm9vcDtcbnByb2Nlc3Mub2ZmID0gbm9vcDtcbnByb2Nlc3MucmVtb3ZlTGlzdGVuZXIgPSBub29wO1xucHJvY2Vzcy5yZW1vdmVBbGxMaXN0ZW5lcnMgPSBub29wO1xucHJvY2Vzcy5lbWl0ID0gbm9vcDtcbnByb2Nlc3MucHJlcGVuZExpc3RlbmVyID0gbm9vcDtcbnByb2Nlc3MucHJlcGVuZE9uY2VMaXN0ZW5lciA9IG5vb3A7XG5cbnByb2Nlc3MubGlzdGVuZXJzID0gZnVuY3Rpb24gKG5hbWUpIHsgcmV0dXJuIFtdIH1cblxucHJvY2Vzcy5iaW5kaW5nID0gZnVuY3Rpb24gKG5hbWUpIHtcbiAgICB0aHJvdyBuZXcgRXJyb3IoJ3Byb2Nlc3MuYmluZGluZyBpcyBub3Qgc3VwcG9ydGVkJyk7XG59O1xuXG5wcm9jZXNzLmN3ZCA9IGZ1bmN0aW9uICgpIHsgcmV0dXJuICcvJyB9O1xucHJvY2Vzcy5jaGRpciA9IGZ1bmN0aW9uIChkaXIpIHtcbiAgICB0aHJvdyBuZXcgRXJyb3IoJ3Byb2Nlc3MuY2hkaXIgaXMgbm90IHN1cHBvcnRlZCcpO1xufTtcbnByb2Nlc3MudW1hc2sgPSBmdW5jdGlvbigpIHsgcmV0dXJuIDA7IH07XG4iLCIvKiFcbiAqIFB1c2hlciBKYXZhU2NyaXB0IExpYnJhcnkgdjcuMC4zXG4gKiBodHRwczovL3B1c2hlci5jb20vXG4gKlxuICogQ29weXJpZ2h0IDIwMjAsIFB1c2hlclxuICogUmVsZWFzZWQgdW5kZXIgdGhlIE1JVCBsaWNlbmNlLlxuICovXG5cbihmdW5jdGlvbiB3ZWJwYWNrVW5pdmVyc2FsTW9kdWxlRGVmaW5pdGlvbihyb290LCBmYWN0b3J5KSB7XG5cdGlmKHR5cGVvZiBleHBvcnRzID09PSAnb2JqZWN0JyAmJiB0eXBlb2YgbW9kdWxlID09PSAnb2JqZWN0Jylcblx0XHRtb2R1bGUuZXhwb3J0cyA9IGZhY3RvcnkoKTtcblx0ZWxzZSBpZih0eXBlb2YgZGVmaW5lID09PSAnZnVuY3Rpb24nICYmIGRlZmluZS5hbWQpXG5cdFx0ZGVmaW5lKFtdLCBmYWN0b3J5KTtcblx0ZWxzZSBpZih0eXBlb2YgZXhwb3J0cyA9PT0gJ29iamVjdCcpXG5cdFx0ZXhwb3J0c1tcIlB1c2hlclwiXSA9IGZhY3RvcnkoKTtcblx0ZWxzZVxuXHRcdHJvb3RbXCJQdXNoZXJcIl0gPSBmYWN0b3J5KCk7XG59KSh3aW5kb3csIGZ1bmN0aW9uKCkge1xucmV0dXJuIC8qKioqKiovIChmdW5jdGlvbihtb2R1bGVzKSB7IC8vIHdlYnBhY2tCb290c3RyYXBcbi8qKioqKiovIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuLyoqKioqKi8gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuLyoqKioqKi9cbi8qKioqKiovIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbi8qKioqKiovIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuLyoqKioqKi9cbi8qKioqKiovIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbi8qKioqKiovIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuLyoqKioqKi8gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4vKioqKioqLyBcdFx0fVxuLyoqKioqKi8gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4vKioqKioqLyBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuLyoqKioqKi8gXHRcdFx0aTogbW9kdWxlSWQsXG4vKioqKioqLyBcdFx0XHRsOiBmYWxzZSxcbi8qKioqKiovIFx0XHRcdGV4cG9ydHM6IHt9XG4vKioqKioqLyBcdFx0fTtcbi8qKioqKiovXG4vKioqKioqLyBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4vKioqKioqLyBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG4vKioqKioqL1xuLyoqKioqKi8gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbi8qKioqKiovIFx0XHRtb2R1bGUubCA9IHRydWU7XG4vKioqKioqL1xuLyoqKioqKi8gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4vKioqKioqLyBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuLyoqKioqKi8gXHR9XG4vKioqKioqL1xuLyoqKioqKi9cbi8qKioqKiovIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbi8qKioqKiovIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcbi8qKioqKiovXG4vKioqKioqLyBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4vKioqKioqLyBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG4vKioqKioqL1xuLyoqKioqKi8gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbi8qKioqKiovIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4vKioqKioqLyBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuLyoqKioqKi8gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHsgZW51bWVyYWJsZTogdHJ1ZSwgZ2V0OiBnZXR0ZXIgfSk7XG4vKioqKioqLyBcdFx0fVxuLyoqKioqKi8gXHR9O1xuLyoqKioqKi9cbi8qKioqKiovIFx0Ly8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuLyoqKioqKi8gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnIgPSBmdW5jdGlvbihleHBvcnRzKSB7XG4vKioqKioqLyBcdFx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG4vKioqKioqLyBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgU3ltYm9sLnRvU3RyaW5nVGFnLCB7IHZhbHVlOiAnTW9kdWxlJyB9KTtcbi8qKioqKiovIFx0XHR9XG4vKioqKioqLyBcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbi8qKioqKiovIFx0fTtcbi8qKioqKiovXG4vKioqKioqLyBcdC8vIGNyZWF0ZSBhIGZha2UgbmFtZXNwYWNlIG9iamVjdFxuLyoqKioqKi8gXHQvLyBtb2RlICYgMTogdmFsdWUgaXMgYSBtb2R1bGUgaWQsIHJlcXVpcmUgaXRcbi8qKioqKiovIFx0Ly8gbW9kZSAmIDI6IG1lcmdlIGFsbCBwcm9wZXJ0aWVzIG9mIHZhbHVlIGludG8gdGhlIG5zXG4vKioqKioqLyBcdC8vIG1vZGUgJiA0OiByZXR1cm4gdmFsdWUgd2hlbiBhbHJlYWR5IG5zIG9iamVjdFxuLyoqKioqKi8gXHQvLyBtb2RlICYgOHwxOiBiZWhhdmUgbGlrZSByZXF1aXJlXG4vKioqKioqLyBcdF9fd2VicGFja19yZXF1aXJlX18udCA9IGZ1bmN0aW9uKHZhbHVlLCBtb2RlKSB7XG4vKioqKioqLyBcdFx0aWYobW9kZSAmIDEpIHZhbHVlID0gX193ZWJwYWNrX3JlcXVpcmVfXyh2YWx1ZSk7XG4vKioqKioqLyBcdFx0aWYobW9kZSAmIDgpIHJldHVybiB2YWx1ZTtcbi8qKioqKiovIFx0XHRpZigobW9kZSAmIDQpICYmIHR5cGVvZiB2YWx1ZSA9PT0gJ29iamVjdCcgJiYgdmFsdWUgJiYgdmFsdWUuX19lc01vZHVsZSkgcmV0dXJuIHZhbHVlO1xuLyoqKioqKi8gXHRcdHZhciBucyA9IE9iamVjdC5jcmVhdGUobnVsbCk7XG4vKioqKioqLyBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5yKG5zKTtcbi8qKioqKiovIFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkobnMsICdkZWZhdWx0JywgeyBlbnVtZXJhYmxlOiB0cnVlLCB2YWx1ZTogdmFsdWUgfSk7XG4vKioqKioqLyBcdFx0aWYobW9kZSAmIDIgJiYgdHlwZW9mIHZhbHVlICE9ICdzdHJpbmcnKSBmb3IodmFyIGtleSBpbiB2YWx1ZSkgX193ZWJwYWNrX3JlcXVpcmVfXy5kKG5zLCBrZXksIGZ1bmN0aW9uKGtleSkgeyByZXR1cm4gdmFsdWVba2V5XTsgfS5iaW5kKG51bGwsIGtleSkpO1xuLyoqKioqKi8gXHRcdHJldHVybiBucztcbi8qKioqKiovIFx0fTtcbi8qKioqKiovXG4vKioqKioqLyBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4vKioqKioqLyBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuLyoqKioqKi8gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuLyoqKioqKi8gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbi8qKioqKiovIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4vKioqKioqLyBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuLyoqKioqKi8gXHRcdHJldHVybiBnZXR0ZXI7XG4vKioqKioqLyBcdH07XG4vKioqKioqL1xuLyoqKioqKi8gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbi8qKioqKiovIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuLyoqKioqKi9cbi8qKioqKiovIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbi8qKioqKiovIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcbi8qKioqKiovXG4vKioqKioqL1xuLyoqKioqKi8gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbi8qKioqKiovIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gMik7XG4vKioqKioqLyB9KVxuLyoqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKi9cbi8qKioqKiovIChbXG4vKiAwICovXG4vKioqLyAoZnVuY3Rpb24obW9kdWxlLCBleHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKSB7XG5cblwidXNlIHN0cmljdFwiO1xuXG4vLyBDb3B5cmlnaHQgKEMpIDIwMTYgRG1pdHJ5IENoZXN0bnlraFxuLy8gTUlUIExpY2Vuc2UuIFNlZSBMSUNFTlNFIGZpbGUgZm9yIGRldGFpbHMuXG52YXIgX19leHRlbmRzID0gKHRoaXMgJiYgdGhpcy5fX2V4dGVuZHMpIHx8IChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGV4dGVuZFN0YXRpY3MgPSBmdW5jdGlvbiAoZCwgYikge1xuICAgICAgICBleHRlbmRTdGF0aWNzID0gT2JqZWN0LnNldFByb3RvdHlwZU9mIHx8XG4gICAgICAgICAgICAoeyBfX3Byb3RvX186IFtdIH0gaW5zdGFuY2VvZiBBcnJheSAmJiBmdW5jdGlvbiAoZCwgYikgeyBkLl9fcHJvdG9fXyA9IGI7IH0pIHx8XG4gICAgICAgICAgICBmdW5jdGlvbiAoZCwgYikgeyBmb3IgKHZhciBwIGluIGIpIGlmIChiLmhhc093blByb3BlcnR5KHApKSBkW3BdID0gYltwXTsgfTtcbiAgICAgICAgcmV0dXJuIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgfTtcbiAgICByZXR1cm4gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyhkLCBiKTtcbiAgICAgICAgZnVuY3Rpb24gX18oKSB7IHRoaXMuY29uc3RydWN0b3IgPSBkOyB9XG4gICAgICAgIGQucHJvdG90eXBlID0gYiA9PT0gbnVsbCA/IE9iamVjdC5jcmVhdGUoYikgOiAoX18ucHJvdG90eXBlID0gYi5wcm90b3R5cGUsIG5ldyBfXygpKTtcbiAgICB9O1xufSkoKTtcbk9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBcIl9fZXNNb2R1bGVcIiwgeyB2YWx1ZTogdHJ1ZSB9KTtcbi8qKlxuICogUGFja2FnZSBiYXNlNjQgaW1wbGVtZW50cyBCYXNlNjQgZW5jb2RpbmcgYW5kIGRlY29kaW5nLlxuICovXG4vLyBJbnZhbGlkIGNoYXJhY3RlciB1c2VkIGluIGRlY29kaW5nIHRvIGluZGljYXRlXG4vLyB0aGF0IHRoZSBjaGFyYWN0ZXIgdG8gZGVjb2RlIGlzIG91dCBvZiByYW5nZSBvZlxuLy8gYWxwaGFiZXQgYW5kIGNhbm5vdCBiZSBkZWNvZGVkLlxudmFyIElOVkFMSURfQllURSA9IDI1Njtcbi8qKlxuICogSW1wbGVtZW50cyBzdGFuZGFyZCBCYXNlNjQgZW5jb2RpbmcuXG4gKlxuICogT3BlcmF0ZXMgaW4gY29uc3RhbnQgdGltZS5cbiAqL1xudmFyIENvZGVyID0gLyoqIEBjbGFzcyAqLyAoZnVuY3Rpb24gKCkge1xuICAgIC8vIFRPRE8oZGNoZXN0KTogbWV0aG9kcyB0byBlbmNvZGUgY2h1bmstYnktY2h1bmsuXG4gICAgZnVuY3Rpb24gQ29kZXIoX3BhZGRpbmdDaGFyYWN0ZXIpIHtcbiAgICAgICAgaWYgKF9wYWRkaW5nQ2hhcmFjdGVyID09PSB2b2lkIDApIHsgX3BhZGRpbmdDaGFyYWN0ZXIgPSBcIj1cIjsgfVxuICAgICAgICB0aGlzLl9wYWRkaW5nQ2hhcmFjdGVyID0gX3BhZGRpbmdDaGFyYWN0ZXI7XG4gICAgfVxuICAgIENvZGVyLnByb3RvdHlwZS5lbmNvZGVkTGVuZ3RoID0gZnVuY3Rpb24gKGxlbmd0aCkge1xuICAgICAgICBpZiAoIXRoaXMuX3BhZGRpbmdDaGFyYWN0ZXIpIHtcbiAgICAgICAgICAgIHJldHVybiAobGVuZ3RoICogOCArIDUpIC8gNiB8IDA7XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIChsZW5ndGggKyAyKSAvIDMgKiA0IHwgMDtcbiAgICB9O1xuICAgIENvZGVyLnByb3RvdHlwZS5lbmNvZGUgPSBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICB2YXIgb3V0ID0gXCJcIjtcbiAgICAgICAgdmFyIGkgPSAwO1xuICAgICAgICBmb3IgKDsgaSA8IGRhdGEubGVuZ3RoIC0gMjsgaSArPSAzKSB7XG4gICAgICAgICAgICB2YXIgYyA9IChkYXRhW2ldIDw8IDE2KSB8IChkYXRhW2kgKyAxXSA8PCA4KSB8IChkYXRhW2kgKyAyXSk7XG4gICAgICAgICAgICBvdXQgKz0gdGhpcy5fZW5jb2RlQnl0ZSgoYyA+Pj4gMyAqIDYpICYgNjMpO1xuICAgICAgICAgICAgb3V0ICs9IHRoaXMuX2VuY29kZUJ5dGUoKGMgPj4+IDIgKiA2KSAmIDYzKTtcbiAgICAgICAgICAgIG91dCArPSB0aGlzLl9lbmNvZGVCeXRlKChjID4+PiAxICogNikgJiA2Myk7XG4gICAgICAgICAgICBvdXQgKz0gdGhpcy5fZW5jb2RlQnl0ZSgoYyA+Pj4gMCAqIDYpICYgNjMpO1xuICAgICAgICB9XG4gICAgICAgIHZhciBsZWZ0ID0gZGF0YS5sZW5ndGggLSBpO1xuICAgICAgICBpZiAobGVmdCA+IDApIHtcbiAgICAgICAgICAgIHZhciBjID0gKGRhdGFbaV0gPDwgMTYpIHwgKGxlZnQgPT09IDIgPyBkYXRhW2kgKyAxXSA8PCA4IDogMCk7XG4gICAgICAgICAgICBvdXQgKz0gdGhpcy5fZW5jb2RlQnl0ZSgoYyA+Pj4gMyAqIDYpICYgNjMpO1xuICAgICAgICAgICAgb3V0ICs9IHRoaXMuX2VuY29kZUJ5dGUoKGMgPj4+IDIgKiA2KSAmIDYzKTtcbiAgICAgICAgICAgIGlmIChsZWZ0ID09PSAyKSB7XG4gICAgICAgICAgICAgICAgb3V0ICs9IHRoaXMuX2VuY29kZUJ5dGUoKGMgPj4+IDEgKiA2KSAmIDYzKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIG91dCArPSB0aGlzLl9wYWRkaW5nQ2hhcmFjdGVyIHx8IFwiXCI7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBvdXQgKz0gdGhpcy5fcGFkZGluZ0NoYXJhY3RlciB8fCBcIlwiO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiBvdXQ7XG4gICAgfTtcbiAgICBDb2Rlci5wcm90b3R5cGUubWF4RGVjb2RlZExlbmd0aCA9IGZ1bmN0aW9uIChsZW5ndGgpIHtcbiAgICAgICAgaWYgKCF0aGlzLl9wYWRkaW5nQ2hhcmFjdGVyKSB7XG4gICAgICAgICAgICByZXR1cm4gKGxlbmd0aCAqIDYgKyA3KSAvIDggfCAwO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiBsZW5ndGggLyA0ICogMyB8IDA7XG4gICAgfTtcbiAgICBDb2Rlci5wcm90b3R5cGUuZGVjb2RlZExlbmd0aCA9IGZ1bmN0aW9uIChzKSB7XG4gICAgICAgIHJldHVybiB0aGlzLm1heERlY29kZWRMZW5ndGgocy5sZW5ndGggLSB0aGlzLl9nZXRQYWRkaW5nTGVuZ3RoKHMpKTtcbiAgICB9O1xuICAgIENvZGVyLnByb3RvdHlwZS5kZWNvZGUgPSBmdW5jdGlvbiAocykge1xuICAgICAgICBpZiAocy5sZW5ndGggPT09IDApIHtcbiAgICAgICAgICAgIHJldHVybiBuZXcgVWludDhBcnJheSgwKTtcbiAgICAgICAgfVxuICAgICAgICB2YXIgcGFkZGluZ0xlbmd0aCA9IHRoaXMuX2dldFBhZGRpbmdMZW5ndGgocyk7XG4gICAgICAgIHZhciBsZW5ndGggPSBzLmxlbmd0aCAtIHBhZGRpbmdMZW5ndGg7XG4gICAgICAgIHZhciBvdXQgPSBuZXcgVWludDhBcnJheSh0aGlzLm1heERlY29kZWRMZW5ndGgobGVuZ3RoKSk7XG4gICAgICAgIHZhciBvcCA9IDA7XG4gICAgICAgIHZhciBpID0gMDtcbiAgICAgICAgdmFyIGhhdmVCYWQgPSAwO1xuICAgICAgICB2YXIgdjAgPSAwLCB2MSA9IDAsIHYyID0gMCwgdjMgPSAwO1xuICAgICAgICBmb3IgKDsgaSA8IGxlbmd0aCAtIDQ7IGkgKz0gNCkge1xuICAgICAgICAgICAgdjAgPSB0aGlzLl9kZWNvZGVDaGFyKHMuY2hhckNvZGVBdChpICsgMCkpO1xuICAgICAgICAgICAgdjEgPSB0aGlzLl9kZWNvZGVDaGFyKHMuY2hhckNvZGVBdChpICsgMSkpO1xuICAgICAgICAgICAgdjIgPSB0aGlzLl9kZWNvZGVDaGFyKHMuY2hhckNvZGVBdChpICsgMikpO1xuICAgICAgICAgICAgdjMgPSB0aGlzLl9kZWNvZGVDaGFyKHMuY2hhckNvZGVBdChpICsgMykpO1xuICAgICAgICAgICAgb3V0W29wKytdID0gKHYwIDw8IDIpIHwgKHYxID4+PiA0KTtcbiAgICAgICAgICAgIG91dFtvcCsrXSA9ICh2MSA8PCA0KSB8ICh2MiA+Pj4gMik7XG4gICAgICAgICAgICBvdXRbb3ArK10gPSAodjIgPDwgNikgfCB2MztcbiAgICAgICAgICAgIGhhdmVCYWQgfD0gdjAgJiBJTlZBTElEX0JZVEU7XG4gICAgICAgICAgICBoYXZlQmFkIHw9IHYxICYgSU5WQUxJRF9CWVRFO1xuICAgICAgICAgICAgaGF2ZUJhZCB8PSB2MiAmIElOVkFMSURfQllURTtcbiAgICAgICAgICAgIGhhdmVCYWQgfD0gdjMgJiBJTlZBTElEX0JZVEU7XG4gICAgICAgIH1cbiAgICAgICAgaWYgKGkgPCBsZW5ndGggLSAxKSB7XG4gICAgICAgICAgICB2MCA9IHRoaXMuX2RlY29kZUNoYXIocy5jaGFyQ29kZUF0KGkpKTtcbiAgICAgICAgICAgIHYxID0gdGhpcy5fZGVjb2RlQ2hhcihzLmNoYXJDb2RlQXQoaSArIDEpKTtcbiAgICAgICAgICAgIG91dFtvcCsrXSA9ICh2MCA8PCAyKSB8ICh2MSA+Pj4gNCk7XG4gICAgICAgICAgICBoYXZlQmFkIHw9IHYwICYgSU5WQUxJRF9CWVRFO1xuICAgICAgICAgICAgaGF2ZUJhZCB8PSB2MSAmIElOVkFMSURfQllURTtcbiAgICAgICAgfVxuICAgICAgICBpZiAoaSA8IGxlbmd0aCAtIDIpIHtcbiAgICAgICAgICAgIHYyID0gdGhpcy5fZGVjb2RlQ2hhcihzLmNoYXJDb2RlQXQoaSArIDIpKTtcbiAgICAgICAgICAgIG91dFtvcCsrXSA9ICh2MSA8PCA0KSB8ICh2MiA+Pj4gMik7XG4gICAgICAgICAgICBoYXZlQmFkIHw9IHYyICYgSU5WQUxJRF9CWVRFO1xuICAgICAgICB9XG4gICAgICAgIGlmIChpIDwgbGVuZ3RoIC0gMykge1xuICAgICAgICAgICAgdjMgPSB0aGlzLl9kZWNvZGVDaGFyKHMuY2hhckNvZGVBdChpICsgMykpO1xuICAgICAgICAgICAgb3V0W29wKytdID0gKHYyIDw8IDYpIHwgdjM7XG4gICAgICAgICAgICBoYXZlQmFkIHw9IHYzICYgSU5WQUxJRF9CWVRFO1xuICAgICAgICB9XG4gICAgICAgIGlmIChoYXZlQmFkICE9PSAwKSB7XG4gICAgICAgICAgICB0aHJvdyBuZXcgRXJyb3IoXCJCYXNlNjRDb2RlcjogaW5jb3JyZWN0IGNoYXJhY3RlcnMgZm9yIGRlY29kaW5nXCIpO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiBvdXQ7XG4gICAgfTtcbiAgICAvLyBTdGFuZGFyZCBlbmNvZGluZyBoYXZlIHRoZSBmb2xsb3dpbmcgZW5jb2RlZC9kZWNvZGVkIHJhbmdlcyxcbiAgICAvLyB3aGljaCB3ZSBuZWVkIHRvIGNvbnZlcnQgYmV0d2Vlbi5cbiAgICAvL1xuICAgIC8vIEFCQ0RFRkdISUpLTE1OT1BRUlNUVVZXWFlaIGFiY2RlZmdoaWprbG1ub3BxcnN0dXZ3eHl6IDAxMjM0NTY3ODkgICsgICAvXG4gICAgLy8gSW5kZXg6ICAgMCAtIDI1ICAgICAgICAgICAgICAgICAgICAyNiAtIDUxICAgICAgICAgICAgICA1MiAtIDYxICAgNjIgIDYzXG4gICAgLy8gQVNDSUk6ICA2NSAtIDkwICAgICAgICAgICAgICAgICAgICA5NyAtIDEyMiAgICAgICAgICAgICA0OCAtIDU3ICAgNDMgIDQ3XG4gICAgLy9cbiAgICAvLyBFbmNvZGUgNiBiaXRzIGluIGIgaW50byBhIG5ldyBjaGFyYWN0ZXIuXG4gICAgQ29kZXIucHJvdG90eXBlLl9lbmNvZGVCeXRlID0gZnVuY3Rpb24gKGIpIHtcbiAgICAgICAgLy8gRW5jb2RpbmcgdXNlcyBjb25zdGFudCB0aW1lIG9wZXJhdGlvbnMgYXMgZm9sbG93czpcbiAgICAgICAgLy9cbiAgICAgICAgLy8gMS4gRGVmaW5lIGNvbXBhcmlzb24gb2YgQSB3aXRoIEIgdXNpbmcgKEEgLSBCKSA+Pj4gODpcbiAgICAgICAgLy8gICAgICAgICAgaWYgQSA+IEIsIHRoZW4gcmVzdWx0IGlzIHBvc2l0aXZlIGludGVnZXJcbiAgICAgICAgLy8gICAgICAgICAgaWYgQSA8PSBCLCB0aGVuIHJlc3VsdCBpcyAwXG4gICAgICAgIC8vXG4gICAgICAgIC8vIDIuIERlZmluZSBzZWxlY3Rpb24gb2YgQyBvciAwIHVzaW5nIGJpdHdpc2UgQU5EOiBYICYgQzpcbiAgICAgICAgLy8gICAgICAgICAgaWYgWCA9PSAwLCB0aGVuIHJlc3VsdCBpcyAwXG4gICAgICAgIC8vICAgICAgICAgIGlmIFggIT0gMCwgdGhlbiByZXN1bHQgaXMgQ1xuICAgICAgICAvL1xuICAgICAgICAvLyAzLiBTdGFydCB3aXRoIHRoZSBzbWFsbGVzdCBjb21wYXJpc29uIChiID49IDApLCB3aGljaCBpcyBhbHdheXNcbiAgICAgICAgLy8gICAgdHJ1ZSwgc28gc2V0IHRoZSByZXN1bHQgdG8gdGhlIHN0YXJ0aW5nIEFTQ0lJIHZhbHVlICg2NSkuXG4gICAgICAgIC8vXG4gICAgICAgIC8vIDQuIENvbnRpbnVlIGNvbXBhcmluZyBiIHRvIGhpZ2hlciBBU0NJSSB2YWx1ZXMsIGFuZCBzZWxlY3RpbmdcbiAgICAgICAgLy8gICAgemVybyBpZiBjb21wYXJpc29uIGlzbid0IHRydWUsIG90aGVyd2lzZSBzZWxlY3RpbmcgYSB2YWx1ZVxuICAgICAgICAvLyAgICB0byBhZGQgdG8gcmVzdWx0LCB3aGljaDpcbiAgICAgICAgLy9cbiAgICAgICAgLy8gICAgICAgICAgYSkgdW5kb2VzIHRoZSBwcmV2aW91cyBhZGRpdGlvblxuICAgICAgICAvLyAgICAgICAgICBiKSBwcm92aWRlcyBuZXcgdmFsdWUgdG8gYWRkXG4gICAgICAgIC8vXG4gICAgICAgIHZhciByZXN1bHQgPSBiO1xuICAgICAgICAvLyBiID49IDBcbiAgICAgICAgcmVzdWx0ICs9IDY1O1xuICAgICAgICAvLyBiID4gMjVcbiAgICAgICAgcmVzdWx0ICs9ICgoMjUgLSBiKSA+Pj4gOCkgJiAoKDAgLSA2NSkgLSAyNiArIDk3KTtcbiAgICAgICAgLy8gYiA+IDUxXG4gICAgICAgIHJlc3VsdCArPSAoKDUxIC0gYikgPj4+IDgpICYgKCgyNiAtIDk3KSAtIDUyICsgNDgpO1xuICAgICAgICAvLyBiID4gNjFcbiAgICAgICAgcmVzdWx0ICs9ICgoNjEgLSBiKSA+Pj4gOCkgJiAoKDUyIC0gNDgpIC0gNjIgKyA0Myk7XG4gICAgICAgIC8vIGIgPiA2MlxuICAgICAgICByZXN1bHQgKz0gKCg2MiAtIGIpID4+PiA4KSAmICgoNjIgLSA0MykgLSA2MyArIDQ3KTtcbiAgICAgICAgcmV0dXJuIFN0cmluZy5mcm9tQ2hhckNvZGUocmVzdWx0KTtcbiAgICB9O1xuICAgIC8vIERlY29kZSBhIGNoYXJhY3RlciBjb2RlIGludG8gYSBieXRlLlxuICAgIC8vIE11c3QgcmV0dXJuIDI1NiBpZiBjaGFyYWN0ZXIgaXMgb3V0IG9mIGFscGhhYmV0IHJhbmdlLlxuICAgIENvZGVyLnByb3RvdHlwZS5fZGVjb2RlQ2hhciA9IGZ1bmN0aW9uIChjKSB7XG4gICAgICAgIC8vIERlY29kaW5nIHdvcmtzIHNpbWlsYXIgdG8gZW5jb2Rpbmc6IHVzaW5nIHRoZSBzYW1lIGNvbXBhcmlzb25cbiAgICAgICAgLy8gZnVuY3Rpb24sIGJ1dCBub3cgaXQgd29ya3Mgb24gcmFuZ2VzOiByZXN1bHQgaXMgYWx3YXlzIGluY3JlbWVudGVkXG4gICAgICAgIC8vIGJ5IHZhbHVlLCBidXQgdGhpcyB2YWx1ZSBiZWNvbWVzIHplcm8gaWYgdGhlIHJhbmdlIGlzIG5vdFxuICAgICAgICAvLyBzYXRpc2ZpZWQuXG4gICAgICAgIC8vXG4gICAgICAgIC8vIERlY29kaW5nIHN0YXJ0cyB3aXRoIGludmFsaWQgdmFsdWUsIDI1Niwgd2hpY2ggaXMgdGhlblxuICAgICAgICAvLyBzdWJ0cmFjdGVkIHdoZW4gdGhlIHJhbmdlIGlzIHNhdGlzZmllZC4gSWYgbm9uZSBvZiB0aGUgcmFuZ2VzXG4gICAgICAgIC8vIGFwcGx5LCB0aGUgZnVuY3Rpb24gcmV0dXJucyAyNTYsIHdoaWNoIGlzIHRoZW4gY2hlY2tlZCBieVxuICAgICAgICAvLyB0aGUgY2FsbGVyIHRvIHRocm93IGVycm9yLlxuICAgICAgICB2YXIgcmVzdWx0ID0gSU5WQUxJRF9CWVRFOyAvLyBzdGFydCB3aXRoIGludmFsaWQgY2hhcmFjdGVyXG4gICAgICAgIC8vIGMgPT0gNDMgKGMgPiA0MiBhbmQgYyA8IDQ0KVxuICAgICAgICByZXN1bHQgKz0gKCgoNDIgLSBjKSAmIChjIC0gNDQpKSA+Pj4gOCkgJiAoLUlOVkFMSURfQllURSArIGMgLSA0MyArIDYyKTtcbiAgICAgICAgLy8gYyA9PSA0NyAoYyA+IDQ2IGFuZCBjIDwgNDgpXG4gICAgICAgIHJlc3VsdCArPSAoKCg0NiAtIGMpICYgKGMgLSA0OCkpID4+PiA4KSAmICgtSU5WQUxJRF9CWVRFICsgYyAtIDQ3ICsgNjMpO1xuICAgICAgICAvLyBjID4gNDcgYW5kIGMgPCA1OFxuICAgICAgICByZXN1bHQgKz0gKCgoNDcgLSBjKSAmIChjIC0gNTgpKSA+Pj4gOCkgJiAoLUlOVkFMSURfQllURSArIGMgLSA0OCArIDUyKTtcbiAgICAgICAgLy8gYyA+IDY0IGFuZCBjIDwgOTFcbiAgICAgICAgcmVzdWx0ICs9ICgoKDY0IC0gYykgJiAoYyAtIDkxKSkgPj4+IDgpICYgKC1JTlZBTElEX0JZVEUgKyBjIC0gNjUgKyAwKTtcbiAgICAgICAgLy8gYyA+IDk2IGFuZCBjIDwgMTIzXG4gICAgICAgIHJlc3VsdCArPSAoKCg5NiAtIGMpICYgKGMgLSAxMjMpKSA+Pj4gOCkgJiAoLUlOVkFMSURfQllURSArIGMgLSA5NyArIDI2KTtcbiAgICAgICAgcmV0dXJuIHJlc3VsdDtcbiAgICB9O1xuICAgIENvZGVyLnByb3RvdHlwZS5fZ2V0UGFkZGluZ0xlbmd0aCA9IGZ1bmN0aW9uIChzKSB7XG4gICAgICAgIHZhciBwYWRkaW5nTGVuZ3RoID0gMDtcbiAgICAgICAgaWYgKHRoaXMuX3BhZGRpbmdDaGFyYWN0ZXIpIHtcbiAgICAgICAgICAgIGZvciAodmFyIGkgPSBzLmxlbmd0aCAtIDE7IGkgPj0gMDsgaS0tKSB7XG4gICAgICAgICAgICAgICAgaWYgKHNbaV0gIT09IHRoaXMuX3BhZGRpbmdDaGFyYWN0ZXIpIHtcbiAgICAgICAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIHBhZGRpbmdMZW5ndGgrKztcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmIChzLmxlbmd0aCA8IDQgfHwgcGFkZGluZ0xlbmd0aCA+IDIpIHtcbiAgICAgICAgICAgICAgICB0aHJvdyBuZXcgRXJyb3IoXCJCYXNlNjRDb2RlcjogaW5jb3JyZWN0IHBhZGRpbmdcIik7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIHBhZGRpbmdMZW5ndGg7XG4gICAgfTtcbiAgICByZXR1cm4gQ29kZXI7XG59KCkpO1xuZXhwb3J0cy5Db2RlciA9IENvZGVyO1xudmFyIHN0ZENvZGVyID0gbmV3IENvZGVyKCk7XG5mdW5jdGlvbiBlbmNvZGUoZGF0YSkge1xuICAgIHJldHVybiBzdGRDb2Rlci5lbmNvZGUoZGF0YSk7XG59XG5leHBvcnRzLmVuY29kZSA9IGVuY29kZTtcbmZ1bmN0aW9uIGRlY29kZShzKSB7XG4gICAgcmV0dXJuIHN0ZENvZGVyLmRlY29kZShzKTtcbn1cbmV4cG9ydHMuZGVjb2RlID0gZGVjb2RlO1xuLyoqXG4gKiBJbXBsZW1lbnRzIFVSTC1zYWZlIEJhc2U2NCBlbmNvZGluZy5cbiAqIChTYW1lIGFzIEJhc2U2NCwgYnV0ICcrJyBpcyByZXBsYWNlZCB3aXRoICctJywgYW5kICcvJyB3aXRoICdfJykuXG4gKlxuICogT3BlcmF0ZXMgaW4gY29uc3RhbnQgdGltZS5cbiAqL1xudmFyIFVSTFNhZmVDb2RlciA9IC8qKiBAY2xhc3MgKi8gKGZ1bmN0aW9uIChfc3VwZXIpIHtcbiAgICBfX2V4dGVuZHMoVVJMU2FmZUNvZGVyLCBfc3VwZXIpO1xuICAgIGZ1bmN0aW9uIFVSTFNhZmVDb2RlcigpIHtcbiAgICAgICAgcmV0dXJuIF9zdXBlciAhPT0gbnVsbCAmJiBfc3VwZXIuYXBwbHkodGhpcywgYXJndW1lbnRzKSB8fCB0aGlzO1xuICAgIH1cbiAgICAvLyBVUkwtc2FmZSBlbmNvZGluZyBoYXZlIHRoZSBmb2xsb3dpbmcgZW5jb2RlZC9kZWNvZGVkIHJhbmdlczpcbiAgICAvL1xuICAgIC8vIEFCQ0RFRkdISUpLTE1OT1BRUlNUVVZXWFlaIGFiY2RlZmdoaWprbG1ub3BxcnN0dXZ3eHl6IDAxMjM0NTY3ODkgIC0gICBfXG4gICAgLy8gSW5kZXg6ICAgMCAtIDI1ICAgICAgICAgICAgICAgICAgICAyNiAtIDUxICAgICAgICAgICAgICA1MiAtIDYxICAgNjIgIDYzXG4gICAgLy8gQVNDSUk6ICA2NSAtIDkwICAgICAgICAgICAgICAgICAgICA5NyAtIDEyMiAgICAgICAgICAgICA0OCAtIDU3ICAgNDUgIDk1XG4gICAgLy9cbiAgICBVUkxTYWZlQ29kZXIucHJvdG90eXBlLl9lbmNvZGVCeXRlID0gZnVuY3Rpb24gKGIpIHtcbiAgICAgICAgdmFyIHJlc3VsdCA9IGI7XG4gICAgICAgIC8vIGIgPj0gMFxuICAgICAgICByZXN1bHQgKz0gNjU7XG4gICAgICAgIC8vIGIgPiAyNVxuICAgICAgICByZXN1bHQgKz0gKCgyNSAtIGIpID4+PiA4KSAmICgoMCAtIDY1KSAtIDI2ICsgOTcpO1xuICAgICAgICAvLyBiID4gNTFcbiAgICAgICAgcmVzdWx0ICs9ICgoNTEgLSBiKSA+Pj4gOCkgJiAoKDI2IC0gOTcpIC0gNTIgKyA0OCk7XG4gICAgICAgIC8vIGIgPiA2MVxuICAgICAgICByZXN1bHQgKz0gKCg2MSAtIGIpID4+PiA4KSAmICgoNTIgLSA0OCkgLSA2MiArIDQ1KTtcbiAgICAgICAgLy8gYiA+IDYyXG4gICAgICAgIHJlc3VsdCArPSAoKDYyIC0gYikgPj4+IDgpICYgKCg2MiAtIDQ1KSAtIDYzICsgOTUpO1xuICAgICAgICByZXR1cm4gU3RyaW5nLmZyb21DaGFyQ29kZShyZXN1bHQpO1xuICAgIH07XG4gICAgVVJMU2FmZUNvZGVyLnByb3RvdHlwZS5fZGVjb2RlQ2hhciA9IGZ1bmN0aW9uIChjKSB7XG4gICAgICAgIHZhciByZXN1bHQgPSBJTlZBTElEX0JZVEU7XG4gICAgICAgIC8vIGMgPT0gNDUgKGMgPiA0NCBhbmQgYyA8IDQ2KVxuICAgICAgICByZXN1bHQgKz0gKCgoNDQgLSBjKSAmIChjIC0gNDYpKSA+Pj4gOCkgJiAoLUlOVkFMSURfQllURSArIGMgLSA0NSArIDYyKTtcbiAgICAgICAgLy8gYyA9PSA5NSAoYyA+IDk0IGFuZCBjIDwgOTYpXG4gICAgICAgIHJlc3VsdCArPSAoKCg5NCAtIGMpICYgKGMgLSA5NikpID4+PiA4KSAmICgtSU5WQUxJRF9CWVRFICsgYyAtIDk1ICsgNjMpO1xuICAgICAgICAvLyBjID4gNDcgYW5kIGMgPCA1OFxuICAgICAgICByZXN1bHQgKz0gKCgoNDcgLSBjKSAmIChjIC0gNTgpKSA+Pj4gOCkgJiAoLUlOVkFMSURfQllURSArIGMgLSA0OCArIDUyKTtcbiAgICAgICAgLy8gYyA+IDY0IGFuZCBjIDwgOTFcbiAgICAgICAgcmVzdWx0ICs9ICgoKDY0IC0gYykgJiAoYyAtIDkxKSkgPj4+IDgpICYgKC1JTlZBTElEX0JZVEUgKyBjIC0gNjUgKyAwKTtcbiAgICAgICAgLy8gYyA+IDk2IGFuZCBjIDwgMTIzXG4gICAgICAgIHJlc3VsdCArPSAoKCg5NiAtIGMpICYgKGMgLSAxMjMpKSA+Pj4gOCkgJiAoLUlOVkFMSURfQllURSArIGMgLSA5NyArIDI2KTtcbiAgICAgICAgcmV0dXJuIHJlc3VsdDtcbiAgICB9O1xuICAgIHJldHVybiBVUkxTYWZlQ29kZXI7XG59KENvZGVyKSk7XG5leHBvcnRzLlVSTFNhZmVDb2RlciA9IFVSTFNhZmVDb2RlcjtcbnZhciB1cmxTYWZlQ29kZXIgPSBuZXcgVVJMU2FmZUNvZGVyKCk7XG5mdW5jdGlvbiBlbmNvZGVVUkxTYWZlKGRhdGEpIHtcbiAgICByZXR1cm4gdXJsU2FmZUNvZGVyLmVuY29kZShkYXRhKTtcbn1cbmV4cG9ydHMuZW5jb2RlVVJMU2FmZSA9IGVuY29kZVVSTFNhZmU7XG5mdW5jdGlvbiBkZWNvZGVVUkxTYWZlKHMpIHtcbiAgICByZXR1cm4gdXJsU2FmZUNvZGVyLmRlY29kZShzKTtcbn1cbmV4cG9ydHMuZGVjb2RlVVJMU2FmZSA9IGRlY29kZVVSTFNhZmU7XG5leHBvcnRzLmVuY29kZWRMZW5ndGggPSBmdW5jdGlvbiAobGVuZ3RoKSB7XG4gICAgcmV0dXJuIHN0ZENvZGVyLmVuY29kZWRMZW5ndGgobGVuZ3RoKTtcbn07XG5leHBvcnRzLm1heERlY29kZWRMZW5ndGggPSBmdW5jdGlvbiAobGVuZ3RoKSB7XG4gICAgcmV0dXJuIHN0ZENvZGVyLm1heERlY29kZWRMZW5ndGgobGVuZ3RoKTtcbn07XG5leHBvcnRzLmRlY29kZWRMZW5ndGggPSBmdW5jdGlvbiAocykge1xuICAgIHJldHVybiBzdGRDb2Rlci5kZWNvZGVkTGVuZ3RoKHMpO1xufTtcbi8vIyBzb3VyY2VNYXBwaW5nVVJMPWJhc2U2NC5qcy5tYXBcblxuLyoqKi8gfSksXG4vKiAxICovXG4vKioqLyAoZnVuY3Rpb24obW9kdWxlLCBleHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKSB7XG5cblwidXNlIHN0cmljdFwiO1xuXG4vLyBDb3B5cmlnaHQgKEMpIDIwMTYgRG1pdHJ5IENoZXN0bnlraFxuLy8gTUlUIExpY2Vuc2UuIFNlZSBMSUNFTlNFIGZpbGUgZm9yIGRldGFpbHMuXG5PYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgXCJfX2VzTW9kdWxlXCIsIHsgdmFsdWU6IHRydWUgfSk7XG4vKipcbiAqIFBhY2thZ2UgdXRmOCBpbXBsZW1lbnRzIFVURi04IGVuY29kaW5nIGFuZCBkZWNvZGluZy5cbiAqL1xudmFyIElOVkFMSURfVVRGMTYgPSBcInV0Zjg6IGludmFsaWQgc3RyaW5nXCI7XG52YXIgSU5WQUxJRF9VVEY4ID0gXCJ1dGY4OiBpbnZhbGlkIHNvdXJjZSBlbmNvZGluZ1wiO1xuLyoqXG4gKiBFbmNvZGVzIHRoZSBnaXZlbiBzdHJpbmcgaW50byBVVEYtOCBieXRlIGFycmF5LlxuICogVGhyb3dzIGlmIHRoZSBzb3VyY2Ugc3RyaW5nIGhhcyBpbnZhbGlkIFVURi0xNiBlbmNvZGluZy5cbiAqL1xuZnVuY3Rpb24gZW5jb2RlKHMpIHtcbiAgICAvLyBDYWxjdWxhdGUgcmVzdWx0IGxlbmd0aCBhbmQgYWxsb2NhdGUgb3V0cHV0IGFycmF5LlxuICAgIC8vIGVuY29kZWRMZW5ndGgoKSBhbHNvIHZhbGlkYXRlcyBzdHJpbmcgYW5kIHRocm93cyBlcnJvcnMsXG4gICAgLy8gc28gd2UgZG9uJ3QgbmVlZCByZXBlYXQgdmFsaWRhdGlvbiBoZXJlLlxuICAgIHZhciBhcnIgPSBuZXcgVWludDhBcnJheShlbmNvZGVkTGVuZ3RoKHMpKTtcbiAgICB2YXIgcG9zID0gMDtcbiAgICBmb3IgKHZhciBpID0gMDsgaSA8IHMubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgdmFyIGMgPSBzLmNoYXJDb2RlQXQoaSk7XG4gICAgICAgIGlmIChjIDwgMHg4MCkge1xuICAgICAgICAgICAgYXJyW3BvcysrXSA9IGM7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAoYyA8IDB4ODAwKSB7XG4gICAgICAgICAgICBhcnJbcG9zKytdID0gMHhjMCB8IGMgPj4gNjtcbiAgICAgICAgICAgIGFycltwb3MrK10gPSAweDgwIHwgYyAmIDB4M2Y7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAoYyA8IDB4ZDgwMCkge1xuICAgICAgICAgICAgYXJyW3BvcysrXSA9IDB4ZTAgfCBjID4+IDEyO1xuICAgICAgICAgICAgYXJyW3BvcysrXSA9IDB4ODAgfCAoYyA+PiA2KSAmIDB4M2Y7XG4gICAgICAgICAgICBhcnJbcG9zKytdID0gMHg4MCB8IGMgJiAweDNmO1xuICAgICAgICB9XG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgaSsrOyAvLyBnZXQgb25lIG1vcmUgY2hhcmFjdGVyXG4gICAgICAgICAgICBjID0gKGMgJiAweDNmZikgPDwgMTA7XG4gICAgICAgICAgICBjIHw9IHMuY2hhckNvZGVBdChpKSAmIDB4M2ZmO1xuICAgICAgICAgICAgYyArPSAweDEwMDAwO1xuICAgICAgICAgICAgYXJyW3BvcysrXSA9IDB4ZjAgfCBjID4+IDE4O1xuICAgICAgICAgICAgYXJyW3BvcysrXSA9IDB4ODAgfCAoYyA+PiAxMikgJiAweDNmO1xuICAgICAgICAgICAgYXJyW3BvcysrXSA9IDB4ODAgfCAoYyA+PiA2KSAmIDB4M2Y7XG4gICAgICAgICAgICBhcnJbcG9zKytdID0gMHg4MCB8IGMgJiAweDNmO1xuICAgICAgICB9XG4gICAgfVxuICAgIHJldHVybiBhcnI7XG59XG5leHBvcnRzLmVuY29kZSA9IGVuY29kZTtcbi8qKlxuICogUmV0dXJucyB0aGUgbnVtYmVyIG9mIGJ5dGVzIHJlcXVpcmVkIHRvIGVuY29kZSB0aGUgZ2l2ZW4gc3RyaW5nIGludG8gVVRGLTguXG4gKiBUaHJvd3MgaWYgdGhlIHNvdXJjZSBzdHJpbmcgaGFzIGludmFsaWQgVVRGLTE2IGVuY29kaW5nLlxuICovXG5mdW5jdGlvbiBlbmNvZGVkTGVuZ3RoKHMpIHtcbiAgICB2YXIgcmVzdWx0ID0gMDtcbiAgICBmb3IgKHZhciBpID0gMDsgaSA8IHMubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgdmFyIGMgPSBzLmNoYXJDb2RlQXQoaSk7XG4gICAgICAgIGlmIChjIDwgMHg4MCkge1xuICAgICAgICAgICAgcmVzdWx0ICs9IDE7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAoYyA8IDB4ODAwKSB7XG4gICAgICAgICAgICByZXN1bHQgKz0gMjtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIGlmIChjIDwgMHhkODAwKSB7XG4gICAgICAgICAgICByZXN1bHQgKz0gMztcbiAgICAgICAgfVxuICAgICAgICBlbHNlIGlmIChjIDw9IDB4ZGZmZikge1xuICAgICAgICAgICAgaWYgKGkgPj0gcy5sZW5ndGggLSAxKSB7XG4gICAgICAgICAgICAgICAgdGhyb3cgbmV3IEVycm9yKElOVkFMSURfVVRGMTYpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgaSsrOyAvLyBcImVhdFwiIG5leHQgY2hhcmFjdGVyXG4gICAgICAgICAgICByZXN1bHQgKz0gNDtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHRocm93IG5ldyBFcnJvcihJTlZBTElEX1VURjE2KTtcbiAgICAgICAgfVxuICAgIH1cbiAgICByZXR1cm4gcmVzdWx0O1xufVxuZXhwb3J0cy5lbmNvZGVkTGVuZ3RoID0gZW5jb2RlZExlbmd0aDtcbi8qKlxuICogRGVjb2RlcyB0aGUgZ2l2ZW4gYnl0ZSBhcnJheSBmcm9tIFVURi04IGludG8gYSBzdHJpbmcuXG4gKiBUaHJvd3MgaWYgZW5jb2RpbmcgaXMgaW52YWxpZC5cbiAqL1xuZnVuY3Rpb24gZGVjb2RlKGFycikge1xuICAgIHZhciBjaGFycyA9IFtdO1xuICAgIGZvciAodmFyIGkgPSAwOyBpIDwgYXJyLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgIHZhciBiID0gYXJyW2ldO1xuICAgICAgICBpZiAoYiAmIDB4ODApIHtcbiAgICAgICAgICAgIHZhciBtaW4gPSB2b2lkIDA7XG4gICAgICAgICAgICBpZiAoYiA8IDB4ZTApIHtcbiAgICAgICAgICAgICAgICAvLyBOZWVkIDEgbW9yZSBieXRlLlxuICAgICAgICAgICAgICAgIGlmIChpID49IGFyci5sZW5ndGgpIHtcbiAgICAgICAgICAgICAgICAgICAgdGhyb3cgbmV3IEVycm9yKElOVkFMSURfVVRGOCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIHZhciBuMSA9IGFyclsrK2ldO1xuICAgICAgICAgICAgICAgIGlmICgobjEgJiAweGMwKSAhPT0gMHg4MCkge1xuICAgICAgICAgICAgICAgICAgICB0aHJvdyBuZXcgRXJyb3IoSU5WQUxJRF9VVEY4KTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgYiA9IChiICYgMHgxZikgPDwgNiB8IChuMSAmIDB4M2YpO1xuICAgICAgICAgICAgICAgIG1pbiA9IDB4ODA7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBlbHNlIGlmIChiIDwgMHhmMCkge1xuICAgICAgICAgICAgICAgIC8vIE5lZWQgMiBtb3JlIGJ5dGVzLlxuICAgICAgICAgICAgICAgIGlmIChpID49IGFyci5sZW5ndGggLSAxKSB7XG4gICAgICAgICAgICAgICAgICAgIHRocm93IG5ldyBFcnJvcihJTlZBTElEX1VURjgpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB2YXIgbjEgPSBhcnJbKytpXTtcbiAgICAgICAgICAgICAgICB2YXIgbjIgPSBhcnJbKytpXTtcbiAgICAgICAgICAgICAgICBpZiAoKG4xICYgMHhjMCkgIT09IDB4ODAgfHwgKG4yICYgMHhjMCkgIT09IDB4ODApIHtcbiAgICAgICAgICAgICAgICAgICAgdGhyb3cgbmV3IEVycm9yKElOVkFMSURfVVRGOCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGIgPSAoYiAmIDB4MGYpIDw8IDEyIHwgKG4xICYgMHgzZikgPDwgNiB8IChuMiAmIDB4M2YpO1xuICAgICAgICAgICAgICAgIG1pbiA9IDB4ODAwO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSBpZiAoYiA8IDB4ZjgpIHtcbiAgICAgICAgICAgICAgICAvLyBOZWVkIDMgbW9yZSBieXRlcy5cbiAgICAgICAgICAgICAgICBpZiAoaSA+PSBhcnIubGVuZ3RoIC0gMikge1xuICAgICAgICAgICAgICAgICAgICB0aHJvdyBuZXcgRXJyb3IoSU5WQUxJRF9VVEY4KTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgdmFyIG4xID0gYXJyWysraV07XG4gICAgICAgICAgICAgICAgdmFyIG4yID0gYXJyWysraV07XG4gICAgICAgICAgICAgICAgdmFyIG4zID0gYXJyWysraV07XG4gICAgICAgICAgICAgICAgaWYgKChuMSAmIDB4YzApICE9PSAweDgwIHx8IChuMiAmIDB4YzApICE9PSAweDgwIHx8IChuMyAmIDB4YzApICE9PSAweDgwKSB7XG4gICAgICAgICAgICAgICAgICAgIHRocm93IG5ldyBFcnJvcihJTlZBTElEX1VURjgpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBiID0gKGIgJiAweDBmKSA8PCAxOCB8IChuMSAmIDB4M2YpIDw8IDEyIHwgKG4yICYgMHgzZikgPDwgNiB8IChuMyAmIDB4M2YpO1xuICAgICAgICAgICAgICAgIG1pbiA9IDB4MTAwMDA7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICB0aHJvdyBuZXcgRXJyb3IoSU5WQUxJRF9VVEY4KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmIChiIDwgbWluIHx8IChiID49IDB4ZDgwMCAmJiBiIDw9IDB4ZGZmZikpIHtcbiAgICAgICAgICAgICAgICB0aHJvdyBuZXcgRXJyb3IoSU5WQUxJRF9VVEY4KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmIChiID49IDB4MTAwMDApIHtcbiAgICAgICAgICAgICAgICAvLyBTdXJyb2dhdGUgcGFpci5cbiAgICAgICAgICAgICAgICBpZiAoYiA+IDB4MTBmZmZmKSB7XG4gICAgICAgICAgICAgICAgICAgIHRocm93IG5ldyBFcnJvcihJTlZBTElEX1VURjgpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBiIC09IDB4MTAwMDA7XG4gICAgICAgICAgICAgICAgY2hhcnMucHVzaChTdHJpbmcuZnJvbUNoYXJDb2RlKDB4ZDgwMCB8IChiID4+IDEwKSkpO1xuICAgICAgICAgICAgICAgIGIgPSAweGRjMDAgfCAoYiAmIDB4M2ZmKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgICBjaGFycy5wdXNoKFN0cmluZy5mcm9tQ2hhckNvZGUoYikpO1xuICAgIH1cbiAgICByZXR1cm4gY2hhcnMuam9pbihcIlwiKTtcbn1cbmV4cG9ydHMuZGVjb2RlID0gZGVjb2RlO1xuLy8jIHNvdXJjZU1hcHBpbmdVUkw9dXRmOC5qcy5tYXBcblxuLyoqKi8gfSksXG4vKiAyICovXG4vKioqLyAoZnVuY3Rpb24obW9kdWxlLCBleHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKSB7XG5cbi8vIHJlcXVpcmVkIHNvIHdlIGRvbid0IGhhdmUgdG8gZG8gcmVxdWlyZSgncHVzaGVyJykuZGVmYXVsdCBldGMuXG5tb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19yZXF1aXJlX18oMykuZGVmYXVsdDtcblxuXG4vKioqLyB9KSxcbi8qIDMgKi9cbi8qKiovIChmdW5jdGlvbihtb2R1bGUsIF9fd2VicGFja19leHBvcnRzX18sIF9fd2VicGFja19yZXF1aXJlX18pIHtcblxuXCJ1c2Ugc3RyaWN0XCI7XG5fX3dlYnBhY2tfcmVxdWlyZV9fLnIoX193ZWJwYWNrX2V4cG9ydHNfXyk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL3J1bnRpbWVzL3dlYi9kb20vc2NyaXB0X3JlY2VpdmVyX2ZhY3RvcnkudHNcbnZhciBTY3JpcHRSZWNlaXZlckZhY3RvcnkgPSAoZnVuY3Rpb24gKCkge1xuICAgIGZ1bmN0aW9uIFNjcmlwdFJlY2VpdmVyRmFjdG9yeShwcmVmaXgsIG5hbWUpIHtcbiAgICAgICAgdGhpcy5sYXN0SWQgPSAwO1xuICAgICAgICB0aGlzLnByZWZpeCA9IHByZWZpeDtcbiAgICAgICAgdGhpcy5uYW1lID0gbmFtZTtcbiAgICB9XG4gICAgU2NyaXB0UmVjZWl2ZXJGYWN0b3J5LnByb3RvdHlwZS5jcmVhdGUgPSBmdW5jdGlvbiAoY2FsbGJhY2spIHtcbiAgICAgICAgdGhpcy5sYXN0SWQrKztcbiAgICAgICAgdmFyIG51bWJlciA9IHRoaXMubGFzdElkO1xuICAgICAgICB2YXIgaWQgPSB0aGlzLnByZWZpeCArIG51bWJlcjtcbiAgICAgICAgdmFyIG5hbWUgPSB0aGlzLm5hbWUgKyAnWycgKyBudW1iZXIgKyAnXSc7XG4gICAgICAgIHZhciBjYWxsZWQgPSBmYWxzZTtcbiAgICAgICAgdmFyIGNhbGxiYWNrV3JhcHBlciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIGlmICghY2FsbGVkKSB7XG4gICAgICAgICAgICAgICAgY2FsbGJhY2suYXBwbHkobnVsbCwgYXJndW1lbnRzKTtcbiAgICAgICAgICAgICAgICBjYWxsZWQgPSB0cnVlO1xuICAgICAgICAgICAgfVxuICAgICAgICB9O1xuICAgICAgICB0aGlzW251bWJlcl0gPSBjYWxsYmFja1dyYXBwZXI7XG4gICAgICAgIHJldHVybiB7IG51bWJlcjogbnVtYmVyLCBpZDogaWQsIG5hbWU6IG5hbWUsIGNhbGxiYWNrOiBjYWxsYmFja1dyYXBwZXIgfTtcbiAgICB9O1xuICAgIFNjcmlwdFJlY2VpdmVyRmFjdG9yeS5wcm90b3R5cGUucmVtb3ZlID0gZnVuY3Rpb24gKHJlY2VpdmVyKSB7XG4gICAgICAgIGRlbGV0ZSB0aGlzW3JlY2VpdmVyLm51bWJlcl07XG4gICAgfTtcbiAgICByZXR1cm4gU2NyaXB0UmVjZWl2ZXJGYWN0b3J5O1xufSgpKTtcblxudmFyIFNjcmlwdFJlY2VpdmVycyA9IG5ldyBTY3JpcHRSZWNlaXZlckZhY3RvcnkoJ19wdXNoZXJfc2NyaXB0XycsICdQdXNoZXIuU2NyaXB0UmVjZWl2ZXJzJyk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvZGVmYXVsdHMudHNcbnZhciBEZWZhdWx0cyA9IHtcbiAgICBWRVJTSU9OOiBcIjcuMC4zXCIsXG4gICAgUFJPVE9DT0w6IDcsXG4gICAgd3NQb3J0OiA4MCxcbiAgICB3c3NQb3J0OiA0NDMsXG4gICAgd3NQYXRoOiAnJyxcbiAgICBodHRwSG9zdDogJ3NvY2tqcy5wdXNoZXIuY29tJyxcbiAgICBodHRwUG9ydDogODAsXG4gICAgaHR0cHNQb3J0OiA0NDMsXG4gICAgaHR0cFBhdGg6ICcvcHVzaGVyJyxcbiAgICBzdGF0c19ob3N0OiAnc3RhdHMucHVzaGVyLmNvbScsXG4gICAgYXV0aEVuZHBvaW50OiAnL3B1c2hlci9hdXRoJyxcbiAgICBhdXRoVHJhbnNwb3J0OiAnYWpheCcsXG4gICAgYWN0aXZpdHlUaW1lb3V0OiAxMjAwMDAsXG4gICAgcG9uZ1RpbWVvdXQ6IDMwMDAwLFxuICAgIHVuYXZhaWxhYmxlVGltZW91dDogMTAwMDAsXG4gICAgY2x1c3RlcjogJ210MScsXG4gICAgY2RuX2h0dHA6IFwiaHR0cDovL2pzLnB1c2hlci5jb21cIixcbiAgICBjZG5faHR0cHM6IFwiaHR0cHM6Ly9qcy5wdXNoZXIuY29tXCIsXG4gICAgZGVwZW5kZW5jeV9zdWZmaXg6IFwiXCJcbn07XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciBkZWZhdWx0cyA9IChEZWZhdWx0cyk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL3J1bnRpbWVzL3dlYi9kb20vZGVwZW5kZW5jeV9sb2FkZXIudHNcblxuXG52YXIgZGVwZW5kZW5jeV9sb2FkZXJfRGVwZW5kZW5jeUxvYWRlciA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gRGVwZW5kZW5jeUxvYWRlcihvcHRpb25zKSB7XG4gICAgICAgIHRoaXMub3B0aW9ucyA9IG9wdGlvbnM7XG4gICAgICAgIHRoaXMucmVjZWl2ZXJzID0gb3B0aW9ucy5yZWNlaXZlcnMgfHwgU2NyaXB0UmVjZWl2ZXJzO1xuICAgICAgICB0aGlzLmxvYWRpbmcgPSB7fTtcbiAgICB9XG4gICAgRGVwZW5kZW5jeUxvYWRlci5wcm90b3R5cGUubG9hZCA9IGZ1bmN0aW9uIChuYW1lLCBvcHRpb25zLCBjYWxsYmFjaykge1xuICAgICAgICB2YXIgc2VsZiA9IHRoaXM7XG4gICAgICAgIGlmIChzZWxmLmxvYWRpbmdbbmFtZV0gJiYgc2VsZi5sb2FkaW5nW25hbWVdLmxlbmd0aCA+IDApIHtcbiAgICAgICAgICAgIHNlbGYubG9hZGluZ1tuYW1lXS5wdXNoKGNhbGxiYWNrKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHNlbGYubG9hZGluZ1tuYW1lXSA9IFtjYWxsYmFja107XG4gICAgICAgICAgICB2YXIgcmVxdWVzdCA9IHJ1bnRpbWUuY3JlYXRlU2NyaXB0UmVxdWVzdChzZWxmLmdldFBhdGgobmFtZSwgb3B0aW9ucykpO1xuICAgICAgICAgICAgdmFyIHJlY2VpdmVyID0gc2VsZi5yZWNlaXZlcnMuY3JlYXRlKGZ1bmN0aW9uIChlcnJvcikge1xuICAgICAgICAgICAgICAgIHNlbGYucmVjZWl2ZXJzLnJlbW92ZShyZWNlaXZlcik7XG4gICAgICAgICAgICAgICAgaWYgKHNlbGYubG9hZGluZ1tuYW1lXSkge1xuICAgICAgICAgICAgICAgICAgICB2YXIgY2FsbGJhY2tzID0gc2VsZi5sb2FkaW5nW25hbWVdO1xuICAgICAgICAgICAgICAgICAgICBkZWxldGUgc2VsZi5sb2FkaW5nW25hbWVdO1xuICAgICAgICAgICAgICAgICAgICB2YXIgc3VjY2Vzc0NhbGxiYWNrID0gZnVuY3Rpb24gKHdhc1N1Y2Nlc3NmdWwpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICghd2FzU3VjY2Vzc2Z1bCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJlcXVlc3QuY2xlYW51cCgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9O1xuICAgICAgICAgICAgICAgICAgICBmb3IgKHZhciBpID0gMDsgaSA8IGNhbGxiYWNrcy5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgICAgICAgICAgICAgY2FsbGJhY2tzW2ldKGVycm9yLCBzdWNjZXNzQ2FsbGJhY2spO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICByZXF1ZXN0LnNlbmQocmVjZWl2ZXIpO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBEZXBlbmRlbmN5TG9hZGVyLnByb3RvdHlwZS5nZXRSb290ID0gZnVuY3Rpb24gKG9wdGlvbnMpIHtcbiAgICAgICAgdmFyIGNkbjtcbiAgICAgICAgdmFyIHByb3RvY29sID0gcnVudGltZS5nZXREb2N1bWVudCgpLmxvY2F0aW9uLnByb3RvY29sO1xuICAgICAgICBpZiAoKG9wdGlvbnMgJiYgb3B0aW9ucy51c2VUTFMpIHx8IHByb3RvY29sID09PSAnaHR0cHM6Jykge1xuICAgICAgICAgICAgY2RuID0gdGhpcy5vcHRpb25zLmNkbl9odHRwcztcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIGNkbiA9IHRoaXMub3B0aW9ucy5jZG5faHR0cDtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gY2RuLnJlcGxhY2UoL1xcLyokLywgJycpICsgJy8nICsgdGhpcy5vcHRpb25zLnZlcnNpb247XG4gICAgfTtcbiAgICBEZXBlbmRlbmN5TG9hZGVyLnByb3RvdHlwZS5nZXRQYXRoID0gZnVuY3Rpb24gKG5hbWUsIG9wdGlvbnMpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMuZ2V0Um9vdChvcHRpb25zKSArICcvJyArIG5hbWUgKyB0aGlzLm9wdGlvbnMuc3VmZml4ICsgJy5qcyc7XG4gICAgfTtcbiAgICByZXR1cm4gRGVwZW5kZW5jeUxvYWRlcjtcbn0oKSk7XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciBkZXBlbmRlbmN5X2xvYWRlciA9IChkZXBlbmRlbmN5X2xvYWRlcl9EZXBlbmRlbmN5TG9hZGVyKTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvcnVudGltZXMvd2ViL2RvbS9kZXBlbmRlbmNpZXMudHNcblxuXG5cbnZhciBEZXBlbmRlbmNpZXNSZWNlaXZlcnMgPSBuZXcgU2NyaXB0UmVjZWl2ZXJGYWN0b3J5KCdfcHVzaGVyX2RlcGVuZGVuY2llcycsICdQdXNoZXIuRGVwZW5kZW5jaWVzUmVjZWl2ZXJzJyk7XG52YXIgRGVwZW5kZW5jaWVzID0gbmV3IGRlcGVuZGVuY3lfbG9hZGVyKHtcbiAgICBjZG5faHR0cDogZGVmYXVsdHMuY2RuX2h0dHAsXG4gICAgY2RuX2h0dHBzOiBkZWZhdWx0cy5jZG5faHR0cHMsXG4gICAgdmVyc2lvbjogZGVmYXVsdHMuVkVSU0lPTixcbiAgICBzdWZmaXg6IGRlZmF1bHRzLmRlcGVuZGVuY3lfc3VmZml4LFxuICAgIHJlY2VpdmVyczogRGVwZW5kZW5jaWVzUmVjZWl2ZXJzXG59KTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS91dGlscy91cmxfc3RvcmUudHNcbnZhciB1cmxTdG9yZSA9IHtcbiAgICBiYXNlVXJsOiAnaHR0cHM6Ly9wdXNoZXIuY29tJyxcbiAgICB1cmxzOiB7XG4gICAgICAgIGF1dGhlbnRpY2F0aW9uRW5kcG9pbnQ6IHtcbiAgICAgICAgICAgIHBhdGg6ICcvZG9jcy9hdXRoZW50aWNhdGluZ191c2VycydcbiAgICAgICAgfSxcbiAgICAgICAgamF2YXNjcmlwdFF1aWNrU3RhcnQ6IHtcbiAgICAgICAgICAgIHBhdGg6ICcvZG9jcy9qYXZhc2NyaXB0X3F1aWNrX3N0YXJ0J1xuICAgICAgICB9LFxuICAgICAgICB0cmlnZ2VyaW5nQ2xpZW50RXZlbnRzOiB7XG4gICAgICAgICAgICBwYXRoOiAnL2RvY3MvY2xpZW50X2FwaV9ndWlkZS9jbGllbnRfZXZlbnRzI3RyaWdnZXItZXZlbnRzJ1xuICAgICAgICB9LFxuICAgICAgICBlbmNyeXB0ZWRDaGFubmVsU3VwcG9ydDoge1xuICAgICAgICAgICAgZnVsbFVybDogJ2h0dHBzOi8vZ2l0aHViLmNvbS9wdXNoZXIvcHVzaGVyLWpzL3RyZWUvY2M0OTEwMTUzNzFhNGJkZTU3NDNkMWM4N2EwZmJhYzBmZWI1MzE5NSNlbmNyeXB0ZWQtY2hhbm5lbC1zdXBwb3J0J1xuICAgICAgICB9XG4gICAgfVxufTtcbnZhciBidWlsZExvZ1N1ZmZpeCA9IGZ1bmN0aW9uIChrZXkpIHtcbiAgICB2YXIgdXJsUHJlZml4ID0gJ1NlZTonO1xuICAgIHZhciB1cmxPYmogPSB1cmxTdG9yZS51cmxzW2tleV07XG4gICAgaWYgKCF1cmxPYmopXG4gICAgICAgIHJldHVybiAnJztcbiAgICB2YXIgdXJsO1xuICAgIGlmICh1cmxPYmouZnVsbFVybCkge1xuICAgICAgICB1cmwgPSB1cmxPYmouZnVsbFVybDtcbiAgICB9XG4gICAgZWxzZSBpZiAodXJsT2JqLnBhdGgpIHtcbiAgICAgICAgdXJsID0gdXJsU3RvcmUuYmFzZVVybCArIHVybE9iai5wYXRoO1xuICAgIH1cbiAgICBpZiAoIXVybClcbiAgICAgICAgcmV0dXJuICcnO1xuICAgIHJldHVybiB1cmxQcmVmaXggKyBcIiBcIiArIHVybDtcbn07XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciB1cmxfc3RvcmUgPSAoeyBidWlsZExvZ1N1ZmZpeDogYnVpbGRMb2dTdWZmaXggfSk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvZXJyb3JzLnRzXG52YXIgX19leHRlbmRzID0gKHVuZGVmaW5lZCAmJiB1bmRlZmluZWQuX19leHRlbmRzKSB8fCAoZnVuY3Rpb24gKCkge1xuICAgIHZhciBleHRlbmRTdGF0aWNzID0gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiB8fFxuICAgICAgICAgICAgKHsgX19wcm90b19fOiBbXSB9IGluc3RhbmNlb2YgQXJyYXkgJiYgZnVuY3Rpb24gKGQsIGIpIHsgZC5fX3Byb3RvX18gPSBiOyB9KSB8fFxuICAgICAgICAgICAgZnVuY3Rpb24gKGQsIGIpIHsgZm9yICh2YXIgcCBpbiBiKSBpZiAoYi5oYXNPd25Qcm9wZXJ0eShwKSkgZFtwXSA9IGJbcF07IH07XG4gICAgICAgIHJldHVybiBleHRlbmRTdGF0aWNzKGQsIGIpO1xuICAgIH07XG4gICAgcmV0dXJuIGZ1bmN0aW9uIChkLCBiKSB7XG4gICAgICAgIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgICAgIGZ1bmN0aW9uIF9fKCkgeyB0aGlzLmNvbnN0cnVjdG9yID0gZDsgfVxuICAgICAgICBkLnByb3RvdHlwZSA9IGIgPT09IG51bGwgPyBPYmplY3QuY3JlYXRlKGIpIDogKF9fLnByb3RvdHlwZSA9IGIucHJvdG90eXBlLCBuZXcgX18oKSk7XG4gICAgfTtcbn0pKCk7XG52YXIgQmFkRXZlbnROYW1lID0gKGZ1bmN0aW9uIChfc3VwZXIpIHtcbiAgICBfX2V4dGVuZHMoQmFkRXZlbnROYW1lLCBfc3VwZXIpO1xuICAgIGZ1bmN0aW9uIEJhZEV2ZW50TmFtZShtc2cpIHtcbiAgICAgICAgdmFyIF9uZXdUYXJnZXQgPSB0aGlzLmNvbnN0cnVjdG9yO1xuICAgICAgICB2YXIgX3RoaXMgPSBfc3VwZXIuY2FsbCh0aGlzLCBtc2cpIHx8IHRoaXM7XG4gICAgICAgIE9iamVjdC5zZXRQcm90b3R5cGVPZihfdGhpcywgX25ld1RhcmdldC5wcm90b3R5cGUpO1xuICAgICAgICByZXR1cm4gX3RoaXM7XG4gICAgfVxuICAgIHJldHVybiBCYWRFdmVudE5hbWU7XG59KEVycm9yKSk7XG5cbnZhciBSZXF1ZXN0VGltZWRPdXQgPSAoZnVuY3Rpb24gKF9zdXBlcikge1xuICAgIF9fZXh0ZW5kcyhSZXF1ZXN0VGltZWRPdXQsIF9zdXBlcik7XG4gICAgZnVuY3Rpb24gUmVxdWVzdFRpbWVkT3V0KG1zZykge1xuICAgICAgICB2YXIgX25ld1RhcmdldCA9IHRoaXMuY29uc3RydWN0b3I7XG4gICAgICAgIHZhciBfdGhpcyA9IF9zdXBlci5jYWxsKHRoaXMsIG1zZykgfHwgdGhpcztcbiAgICAgICAgT2JqZWN0LnNldFByb3RvdHlwZU9mKF90aGlzLCBfbmV3VGFyZ2V0LnByb3RvdHlwZSk7XG4gICAgICAgIHJldHVybiBfdGhpcztcbiAgICB9XG4gICAgcmV0dXJuIFJlcXVlc3RUaW1lZE91dDtcbn0oRXJyb3IpKTtcblxudmFyIFRyYW5zcG9ydFByaW9yaXR5VG9vTG93ID0gKGZ1bmN0aW9uIChfc3VwZXIpIHtcbiAgICBfX2V4dGVuZHMoVHJhbnNwb3J0UHJpb3JpdHlUb29Mb3csIF9zdXBlcik7XG4gICAgZnVuY3Rpb24gVHJhbnNwb3J0UHJpb3JpdHlUb29Mb3cobXNnKSB7XG4gICAgICAgIHZhciBfbmV3VGFyZ2V0ID0gdGhpcy5jb25zdHJ1Y3RvcjtcbiAgICAgICAgdmFyIF90aGlzID0gX3N1cGVyLmNhbGwodGhpcywgbXNnKSB8fCB0aGlzO1xuICAgICAgICBPYmplY3Quc2V0UHJvdG90eXBlT2YoX3RoaXMsIF9uZXdUYXJnZXQucHJvdG90eXBlKTtcbiAgICAgICAgcmV0dXJuIF90aGlzO1xuICAgIH1cbiAgICByZXR1cm4gVHJhbnNwb3J0UHJpb3JpdHlUb29Mb3c7XG59KEVycm9yKSk7XG5cbnZhciBUcmFuc3BvcnRDbG9zZWQgPSAoZnVuY3Rpb24gKF9zdXBlcikge1xuICAgIF9fZXh0ZW5kcyhUcmFuc3BvcnRDbG9zZWQsIF9zdXBlcik7XG4gICAgZnVuY3Rpb24gVHJhbnNwb3J0Q2xvc2VkKG1zZykge1xuICAgICAgICB2YXIgX25ld1RhcmdldCA9IHRoaXMuY29uc3RydWN0b3I7XG4gICAgICAgIHZhciBfdGhpcyA9IF9zdXBlci5jYWxsKHRoaXMsIG1zZykgfHwgdGhpcztcbiAgICAgICAgT2JqZWN0LnNldFByb3RvdHlwZU9mKF90aGlzLCBfbmV3VGFyZ2V0LnByb3RvdHlwZSk7XG4gICAgICAgIHJldHVybiBfdGhpcztcbiAgICB9XG4gICAgcmV0dXJuIFRyYW5zcG9ydENsb3NlZDtcbn0oRXJyb3IpKTtcblxudmFyIFVuc3VwcG9ydGVkRmVhdHVyZSA9IChmdW5jdGlvbiAoX3N1cGVyKSB7XG4gICAgX19leHRlbmRzKFVuc3VwcG9ydGVkRmVhdHVyZSwgX3N1cGVyKTtcbiAgICBmdW5jdGlvbiBVbnN1cHBvcnRlZEZlYXR1cmUobXNnKSB7XG4gICAgICAgIHZhciBfbmV3VGFyZ2V0ID0gdGhpcy5jb25zdHJ1Y3RvcjtcbiAgICAgICAgdmFyIF90aGlzID0gX3N1cGVyLmNhbGwodGhpcywgbXNnKSB8fCB0aGlzO1xuICAgICAgICBPYmplY3Quc2V0UHJvdG90eXBlT2YoX3RoaXMsIF9uZXdUYXJnZXQucHJvdG90eXBlKTtcbiAgICAgICAgcmV0dXJuIF90aGlzO1xuICAgIH1cbiAgICByZXR1cm4gVW5zdXBwb3J0ZWRGZWF0dXJlO1xufShFcnJvcikpO1xuXG52YXIgVW5zdXBwb3J0ZWRUcmFuc3BvcnQgPSAoZnVuY3Rpb24gKF9zdXBlcikge1xuICAgIF9fZXh0ZW5kcyhVbnN1cHBvcnRlZFRyYW5zcG9ydCwgX3N1cGVyKTtcbiAgICBmdW5jdGlvbiBVbnN1cHBvcnRlZFRyYW5zcG9ydChtc2cpIHtcbiAgICAgICAgdmFyIF9uZXdUYXJnZXQgPSB0aGlzLmNvbnN0cnVjdG9yO1xuICAgICAgICB2YXIgX3RoaXMgPSBfc3VwZXIuY2FsbCh0aGlzLCBtc2cpIHx8IHRoaXM7XG4gICAgICAgIE9iamVjdC5zZXRQcm90b3R5cGVPZihfdGhpcywgX25ld1RhcmdldC5wcm90b3R5cGUpO1xuICAgICAgICByZXR1cm4gX3RoaXM7XG4gICAgfVxuICAgIHJldHVybiBVbnN1cHBvcnRlZFRyYW5zcG9ydDtcbn0oRXJyb3IpKTtcblxudmFyIFVuc3VwcG9ydGVkU3RyYXRlZ3kgPSAoZnVuY3Rpb24gKF9zdXBlcikge1xuICAgIF9fZXh0ZW5kcyhVbnN1cHBvcnRlZFN0cmF0ZWd5LCBfc3VwZXIpO1xuICAgIGZ1bmN0aW9uIFVuc3VwcG9ydGVkU3RyYXRlZ3kobXNnKSB7XG4gICAgICAgIHZhciBfbmV3VGFyZ2V0ID0gdGhpcy5jb25zdHJ1Y3RvcjtcbiAgICAgICAgdmFyIF90aGlzID0gX3N1cGVyLmNhbGwodGhpcywgbXNnKSB8fCB0aGlzO1xuICAgICAgICBPYmplY3Quc2V0UHJvdG90eXBlT2YoX3RoaXMsIF9uZXdUYXJnZXQucHJvdG90eXBlKTtcbiAgICAgICAgcmV0dXJuIF90aGlzO1xuICAgIH1cbiAgICByZXR1cm4gVW5zdXBwb3J0ZWRTdHJhdGVneTtcbn0oRXJyb3IpKTtcblxudmFyIEhUVFBBdXRoRXJyb3IgPSAoZnVuY3Rpb24gKF9zdXBlcikge1xuICAgIF9fZXh0ZW5kcyhIVFRQQXV0aEVycm9yLCBfc3VwZXIpO1xuICAgIGZ1bmN0aW9uIEhUVFBBdXRoRXJyb3Ioc3RhdHVzLCBtc2cpIHtcbiAgICAgICAgdmFyIF9uZXdUYXJnZXQgPSB0aGlzLmNvbnN0cnVjdG9yO1xuICAgICAgICB2YXIgX3RoaXMgPSBfc3VwZXIuY2FsbCh0aGlzLCBtc2cpIHx8IHRoaXM7XG4gICAgICAgIF90aGlzLnN0YXR1cyA9IHN0YXR1cztcbiAgICAgICAgT2JqZWN0LnNldFByb3RvdHlwZU9mKF90aGlzLCBfbmV3VGFyZ2V0LnByb3RvdHlwZSk7XG4gICAgICAgIHJldHVybiBfdGhpcztcbiAgICB9XG4gICAgcmV0dXJuIEhUVFBBdXRoRXJyb3I7XG59KEVycm9yKSk7XG5cblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvcnVudGltZXMvaXNvbW9ycGhpYy9hdXRoL3hocl9hdXRoLnRzXG5cblxuXG52YXIgYWpheCA9IGZ1bmN0aW9uIChjb250ZXh0LCBzb2NrZXRJZCwgY2FsbGJhY2spIHtcbiAgICB2YXIgc2VsZiA9IHRoaXMsIHhocjtcbiAgICB4aHIgPSBydW50aW1lLmNyZWF0ZVhIUigpO1xuICAgIHhoci5vcGVuKCdQT1NUJywgc2VsZi5vcHRpb25zLmF1dGhFbmRwb2ludCwgdHJ1ZSk7XG4gICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcbiAgICBmb3IgKHZhciBoZWFkZXJOYW1lIGluIHRoaXMuYXV0aE9wdGlvbnMuaGVhZGVycykge1xuICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcihoZWFkZXJOYW1lLCB0aGlzLmF1dGhPcHRpb25zLmhlYWRlcnNbaGVhZGVyTmFtZV0pO1xuICAgIH1cbiAgICB4aHIub25yZWFkeXN0YXRlY2hhbmdlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBpZiAoeGhyLnJlYWR5U3RhdGUgPT09IDQpIHtcbiAgICAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDApIHtcbiAgICAgICAgICAgICAgICB2YXIgZGF0YSA9IHZvaWQgMDtcbiAgICAgICAgICAgICAgICB2YXIgcGFyc2VkID0gZmFsc2U7XG4gICAgICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgICAgICAgZGF0YSA9IEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlVGV4dCk7XG4gICAgICAgICAgICAgICAgICAgIHBhcnNlZCA9IHRydWU7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGNhdGNoIChlKSB7XG4gICAgICAgICAgICAgICAgICAgIGNhbGxiYWNrKG5ldyBIVFRQQXV0aEVycm9yKDIwMCwgJ0pTT04gcmV0dXJuZWQgZnJvbSBhdXRoIGVuZHBvaW50IHdhcyBpbnZhbGlkLCB5ZXQgc3RhdHVzIGNvZGUgd2FzIDIwMC4gRGF0YSB3YXM6ICcgK1xuICAgICAgICAgICAgICAgICAgICAgICAgeGhyLnJlc3BvbnNlVGV4dCksIHsgYXV0aDogJycgfSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGlmIChwYXJzZWQpIHtcbiAgICAgICAgICAgICAgICAgICAgY2FsbGJhY2sobnVsbCwgZGF0YSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgdmFyIHN1ZmZpeCA9IHVybF9zdG9yZS5idWlsZExvZ1N1ZmZpeCgnYXV0aGVudGljYXRpb25FbmRwb2ludCcpO1xuICAgICAgICAgICAgICAgIGNhbGxiYWNrKG5ldyBIVFRQQXV0aEVycm9yKHhoci5zdGF0dXMsICdVbmFibGUgdG8gcmV0cmlldmUgYXV0aCBzdHJpbmcgZnJvbSBhdXRoIGVuZHBvaW50IC0gJyArXG4gICAgICAgICAgICAgICAgICAgIChcInJlY2VpdmVkIHN0YXR1czogXCIgKyB4aHIuc3RhdHVzICsgXCIgZnJvbSBcIiArIHNlbGYub3B0aW9ucy5hdXRoRW5kcG9pbnQgKyBcIi4gXCIpICtcbiAgICAgICAgICAgICAgICAgICAgKFwiQ2xpZW50cyBtdXN0IGJlIGF1dGhlbnRpY2F0ZWQgdG8gam9pbiBwcml2YXRlIG9yIHByZXNlbmNlIGNoYW5uZWxzLiBcIiArIHN1ZmZpeCkpLCB7IGF1dGg6ICcnIH0pO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfTtcbiAgICB4aHIuc2VuZCh0aGlzLmNvbXBvc2VRdWVyeShzb2NrZXRJZCkpO1xuICAgIHJldHVybiB4aHI7XG59O1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgeGhyX2F1dGggPSAoYWpheCk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvYmFzZTY0LnRzXG5mdW5jdGlvbiBlbmNvZGUocykge1xuICAgIHJldHVybiBidG9hKHV0b2IocykpO1xufVxudmFyIGZyb21DaGFyQ29kZSA9IFN0cmluZy5mcm9tQ2hhckNvZGU7XG52YXIgYjY0Y2hhcnMgPSAnQUJDREVGR0hJSktMTU5PUFFSU1RVVldYWVphYmNkZWZnaGlqa2xtbm9wcXJzdHV2d3h5ejAxMjM0NTY3ODkrLyc7XG52YXIgYjY0dGFiID0ge307XG5mb3IgKHZhciBiYXNlNjRfaSA9IDAsIGwgPSBiNjRjaGFycy5sZW5ndGg7IGJhc2U2NF9pIDwgbDsgYmFzZTY0X2krKykge1xuICAgIGI2NHRhYltiNjRjaGFycy5jaGFyQXQoYmFzZTY0X2kpXSA9IGJhc2U2NF9pO1xufVxudmFyIGNiX3V0b2IgPSBmdW5jdGlvbiAoYykge1xuICAgIHZhciBjYyA9IGMuY2hhckNvZGVBdCgwKTtcbiAgICByZXR1cm4gY2MgPCAweDgwXG4gICAgICAgID8gY1xuICAgICAgICA6IGNjIDwgMHg4MDBcbiAgICAgICAgICAgID8gZnJvbUNoYXJDb2RlKDB4YzAgfCAoY2MgPj4+IDYpKSArIGZyb21DaGFyQ29kZSgweDgwIHwgKGNjICYgMHgzZikpXG4gICAgICAgICAgICA6IGZyb21DaGFyQ29kZSgweGUwIHwgKChjYyA+Pj4gMTIpICYgMHgwZikpICtcbiAgICAgICAgICAgICAgICBmcm9tQ2hhckNvZGUoMHg4MCB8ICgoY2MgPj4+IDYpICYgMHgzZikpICtcbiAgICAgICAgICAgICAgICBmcm9tQ2hhckNvZGUoMHg4MCB8IChjYyAmIDB4M2YpKTtcbn07XG52YXIgdXRvYiA9IGZ1bmN0aW9uICh1KSB7XG4gICAgcmV0dXJuIHUucmVwbGFjZSgvW15cXHgwMC1cXHg3Rl0vZywgY2JfdXRvYik7XG59O1xudmFyIGNiX2VuY29kZSA9IGZ1bmN0aW9uIChjY2MpIHtcbiAgICB2YXIgcGFkbGVuID0gWzAsIDIsIDFdW2NjYy5sZW5ndGggJSAzXTtcbiAgICB2YXIgb3JkID0gKGNjYy5jaGFyQ29kZUF0KDApIDw8IDE2KSB8XG4gICAgICAgICgoY2NjLmxlbmd0aCA+IDEgPyBjY2MuY2hhckNvZGVBdCgxKSA6IDApIDw8IDgpIHxcbiAgICAgICAgKGNjYy5sZW5ndGggPiAyID8gY2NjLmNoYXJDb2RlQXQoMikgOiAwKTtcbiAgICB2YXIgY2hhcnMgPSBbXG4gICAgICAgIGI2NGNoYXJzLmNoYXJBdChvcmQgPj4+IDE4KSxcbiAgICAgICAgYjY0Y2hhcnMuY2hhckF0KChvcmQgPj4+IDEyKSAmIDYzKSxcbiAgICAgICAgcGFkbGVuID49IDIgPyAnPScgOiBiNjRjaGFycy5jaGFyQXQoKG9yZCA+Pj4gNikgJiA2MyksXG4gICAgICAgIHBhZGxlbiA+PSAxID8gJz0nIDogYjY0Y2hhcnMuY2hhckF0KG9yZCAmIDYzKVxuICAgIF07XG4gICAgcmV0dXJuIGNoYXJzLmpvaW4oJycpO1xufTtcbnZhciBidG9hID0gd2luZG93LmJ0b2EgfHxcbiAgICBmdW5jdGlvbiAoYikge1xuICAgICAgICByZXR1cm4gYi5yZXBsYWNlKC9bXFxzXFxTXXsxLDN9L2csIGNiX2VuY29kZSk7XG4gICAgfTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS91dGlscy90aW1lcnMvYWJzdHJhY3RfdGltZXIudHNcbnZhciBUaW1lciA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gVGltZXIoc2V0LCBjbGVhciwgZGVsYXksIGNhbGxiYWNrKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIHRoaXMuY2xlYXIgPSBjbGVhcjtcbiAgICAgICAgdGhpcy50aW1lciA9IHNldChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBpZiAoX3RoaXMudGltZXIpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy50aW1lciA9IGNhbGxiYWNrKF90aGlzLnRpbWVyKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSwgZGVsYXkpO1xuICAgIH1cbiAgICBUaW1lci5wcm90b3R5cGUuaXNSdW5uaW5nID0gZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdGhpcy50aW1lciAhPT0gbnVsbDtcbiAgICB9O1xuICAgIFRpbWVyLnByb3RvdHlwZS5lbnN1cmVBYm9ydGVkID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBpZiAodGhpcy50aW1lcikge1xuICAgICAgICAgICAgdGhpcy5jbGVhcih0aGlzLnRpbWVyKTtcbiAgICAgICAgICAgIHRoaXMudGltZXIgPSBudWxsO1xuICAgICAgICB9XG4gICAgfTtcbiAgICByZXR1cm4gVGltZXI7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgYWJzdHJhY3RfdGltZXIgPSAoVGltZXIpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3V0aWxzL3RpbWVycy9pbmRleC50c1xudmFyIHRpbWVyc19leHRlbmRzID0gKHVuZGVmaW5lZCAmJiB1bmRlZmluZWQuX19leHRlbmRzKSB8fCAoZnVuY3Rpb24gKCkge1xuICAgIHZhciBleHRlbmRTdGF0aWNzID0gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiB8fFxuICAgICAgICAgICAgKHsgX19wcm90b19fOiBbXSB9IGluc3RhbmNlb2YgQXJyYXkgJiYgZnVuY3Rpb24gKGQsIGIpIHsgZC5fX3Byb3RvX18gPSBiOyB9KSB8fFxuICAgICAgICAgICAgZnVuY3Rpb24gKGQsIGIpIHsgZm9yICh2YXIgcCBpbiBiKSBpZiAoYi5oYXNPd25Qcm9wZXJ0eShwKSkgZFtwXSA9IGJbcF07IH07XG4gICAgICAgIHJldHVybiBleHRlbmRTdGF0aWNzKGQsIGIpO1xuICAgIH07XG4gICAgcmV0dXJuIGZ1bmN0aW9uIChkLCBiKSB7XG4gICAgICAgIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgICAgIGZ1bmN0aW9uIF9fKCkgeyB0aGlzLmNvbnN0cnVjdG9yID0gZDsgfVxuICAgICAgICBkLnByb3RvdHlwZSA9IGIgPT09IG51bGwgPyBPYmplY3QuY3JlYXRlKGIpIDogKF9fLnByb3RvdHlwZSA9IGIucHJvdG90eXBlLCBuZXcgX18oKSk7XG4gICAgfTtcbn0pKCk7XG5cbmZ1bmN0aW9uIHRpbWVyc19jbGVhclRpbWVvdXQodGltZXIpIHtcbiAgICB3aW5kb3cuY2xlYXJUaW1lb3V0KHRpbWVyKTtcbn1cbmZ1bmN0aW9uIHRpbWVyc19jbGVhckludGVydmFsKHRpbWVyKSB7XG4gICAgd2luZG93LmNsZWFySW50ZXJ2YWwodGltZXIpO1xufVxudmFyIE9uZU9mZlRpbWVyID0gKGZ1bmN0aW9uIChfc3VwZXIpIHtcbiAgICB0aW1lcnNfZXh0ZW5kcyhPbmVPZmZUaW1lciwgX3N1cGVyKTtcbiAgICBmdW5jdGlvbiBPbmVPZmZUaW1lcihkZWxheSwgY2FsbGJhY2spIHtcbiAgICAgICAgcmV0dXJuIF9zdXBlci5jYWxsKHRoaXMsIHNldFRpbWVvdXQsIHRpbWVyc19jbGVhclRpbWVvdXQsIGRlbGF5LCBmdW5jdGlvbiAodGltZXIpIHtcbiAgICAgICAgICAgIGNhbGxiYWNrKCk7XG4gICAgICAgICAgICByZXR1cm4gbnVsbDtcbiAgICAgICAgfSkgfHwgdGhpcztcbiAgICB9XG4gICAgcmV0dXJuIE9uZU9mZlRpbWVyO1xufShhYnN0cmFjdF90aW1lcikpO1xuXG52YXIgUGVyaW9kaWNUaW1lciA9IChmdW5jdGlvbiAoX3N1cGVyKSB7XG4gICAgdGltZXJzX2V4dGVuZHMoUGVyaW9kaWNUaW1lciwgX3N1cGVyKTtcbiAgICBmdW5jdGlvbiBQZXJpb2RpY1RpbWVyKGRlbGF5LCBjYWxsYmFjaykge1xuICAgICAgICByZXR1cm4gX3N1cGVyLmNhbGwodGhpcywgc2V0SW50ZXJ2YWwsIHRpbWVyc19jbGVhckludGVydmFsLCBkZWxheSwgZnVuY3Rpb24gKHRpbWVyKSB7XG4gICAgICAgICAgICBjYWxsYmFjaygpO1xuICAgICAgICAgICAgcmV0dXJuIHRpbWVyO1xuICAgICAgICB9KSB8fCB0aGlzO1xuICAgIH1cbiAgICByZXR1cm4gUGVyaW9kaWNUaW1lcjtcbn0oYWJzdHJhY3RfdGltZXIpKTtcblxuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3V0aWwudHNcblxudmFyIFV0aWwgPSB7XG4gICAgbm93OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmIChEYXRlLm5vdykge1xuICAgICAgICAgICAgcmV0dXJuIERhdGUubm93KCk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICByZXR1cm4gbmV3IERhdGUoKS52YWx1ZU9mKCk7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIGRlZmVyOiBmdW5jdGlvbiAoY2FsbGJhY2spIHtcbiAgICAgICAgcmV0dXJuIG5ldyBPbmVPZmZUaW1lcigwLCBjYWxsYmFjayk7XG4gICAgfSxcbiAgICBtZXRob2Q6IGZ1bmN0aW9uIChuYW1lKSB7XG4gICAgICAgIHZhciBhcmdzID0gW107XG4gICAgICAgIGZvciAodmFyIF9pID0gMTsgX2kgPCBhcmd1bWVudHMubGVuZ3RoOyBfaSsrKSB7XG4gICAgICAgICAgICBhcmdzW19pIC0gMV0gPSBhcmd1bWVudHNbX2ldO1xuICAgICAgICB9XG4gICAgICAgIHZhciBib3VuZEFyZ3VtZW50cyA9IEFycmF5LnByb3RvdHlwZS5zbGljZS5jYWxsKGFyZ3VtZW50cywgMSk7XG4gICAgICAgIHJldHVybiBmdW5jdGlvbiAob2JqZWN0KSB7XG4gICAgICAgICAgICByZXR1cm4gb2JqZWN0W25hbWVdLmFwcGx5KG9iamVjdCwgYm91bmRBcmd1bWVudHMuY29uY2F0KGFyZ3VtZW50cykpO1xuICAgICAgICB9O1xuICAgIH1cbn07XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciB1dGlsID0gKFV0aWwpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3V0aWxzL2NvbGxlY3Rpb25zLnRzXG5cblxuZnVuY3Rpb24gZXh0ZW5kKHRhcmdldCkge1xuICAgIHZhciBzb3VyY2VzID0gW107XG4gICAgZm9yICh2YXIgX2kgPSAxOyBfaSA8IGFyZ3VtZW50cy5sZW5ndGg7IF9pKyspIHtcbiAgICAgICAgc291cmNlc1tfaSAtIDFdID0gYXJndW1lbnRzW19pXTtcbiAgICB9XG4gICAgZm9yICh2YXIgaSA9IDA7IGkgPCBzb3VyY2VzLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgIHZhciBleHRlbnNpb25zID0gc291cmNlc1tpXTtcbiAgICAgICAgZm9yICh2YXIgcHJvcGVydHkgaW4gZXh0ZW5zaW9ucykge1xuICAgICAgICAgICAgaWYgKGV4dGVuc2lvbnNbcHJvcGVydHldICYmXG4gICAgICAgICAgICAgICAgZXh0ZW5zaW9uc1twcm9wZXJ0eV0uY29uc3RydWN0b3IgJiZcbiAgICAgICAgICAgICAgICBleHRlbnNpb25zW3Byb3BlcnR5XS5jb25zdHJ1Y3RvciA9PT0gT2JqZWN0KSB7XG4gICAgICAgICAgICAgICAgdGFyZ2V0W3Byb3BlcnR5XSA9IGV4dGVuZCh0YXJnZXRbcHJvcGVydHldIHx8IHt9LCBleHRlbnNpb25zW3Byb3BlcnR5XSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICB0YXJnZXRbcHJvcGVydHldID0gZXh0ZW5zaW9uc1twcm9wZXJ0eV07XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9XG4gICAgcmV0dXJuIHRhcmdldDtcbn1cbmZ1bmN0aW9uIHN0cmluZ2lmeSgpIHtcbiAgICB2YXIgbSA9IFsnUHVzaGVyJ107XG4gICAgZm9yICh2YXIgaSA9IDA7IGkgPCBhcmd1bWVudHMubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgaWYgKHR5cGVvZiBhcmd1bWVudHNbaV0gPT09ICdzdHJpbmcnKSB7XG4gICAgICAgICAgICBtLnB1c2goYXJndW1lbnRzW2ldKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIG0ucHVzaChzYWZlSlNPTlN0cmluZ2lmeShhcmd1bWVudHNbaV0pKTtcbiAgICAgICAgfVxuICAgIH1cbiAgICByZXR1cm4gbS5qb2luKCcgOiAnKTtcbn1cbmZ1bmN0aW9uIGFycmF5SW5kZXhPZihhcnJheSwgaXRlbSkge1xuICAgIHZhciBuYXRpdmVJbmRleE9mID0gQXJyYXkucHJvdG90eXBlLmluZGV4T2Y7XG4gICAgaWYgKGFycmF5ID09PSBudWxsKSB7XG4gICAgICAgIHJldHVybiAtMTtcbiAgICB9XG4gICAgaWYgKG5hdGl2ZUluZGV4T2YgJiYgYXJyYXkuaW5kZXhPZiA9PT0gbmF0aXZlSW5kZXhPZikge1xuICAgICAgICByZXR1cm4gYXJyYXkuaW5kZXhPZihpdGVtKTtcbiAgICB9XG4gICAgZm9yICh2YXIgaSA9IDAsIGwgPSBhcnJheS5sZW5ndGg7IGkgPCBsOyBpKyspIHtcbiAgICAgICAgaWYgKGFycmF5W2ldID09PSBpdGVtKSB7XG4gICAgICAgICAgICByZXR1cm4gaTtcbiAgICAgICAgfVxuICAgIH1cbiAgICByZXR1cm4gLTE7XG59XG5mdW5jdGlvbiBvYmplY3RBcHBseShvYmplY3QsIGYpIHtcbiAgICBmb3IgKHZhciBrZXkgaW4gb2JqZWN0KSB7XG4gICAgICAgIGlmIChPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBrZXkpKSB7XG4gICAgICAgICAgICBmKG9iamVjdFtrZXldLCBrZXksIG9iamVjdCk7XG4gICAgICAgIH1cbiAgICB9XG59XG5mdW5jdGlvbiBrZXlzKG9iamVjdCkge1xuICAgIHZhciBrZXlzID0gW107XG4gICAgb2JqZWN0QXBwbHkob2JqZWN0LCBmdW5jdGlvbiAoXywga2V5KSB7XG4gICAgICAgIGtleXMucHVzaChrZXkpO1xuICAgIH0pO1xuICAgIHJldHVybiBrZXlzO1xufVxuZnVuY3Rpb24gdmFsdWVzKG9iamVjdCkge1xuICAgIHZhciB2YWx1ZXMgPSBbXTtcbiAgICBvYmplY3RBcHBseShvYmplY3QsIGZ1bmN0aW9uICh2YWx1ZSkge1xuICAgICAgICB2YWx1ZXMucHVzaCh2YWx1ZSk7XG4gICAgfSk7XG4gICAgcmV0dXJuIHZhbHVlcztcbn1cbmZ1bmN0aW9uIGFwcGx5KGFycmF5LCBmLCBjb250ZXh0KSB7XG4gICAgZm9yICh2YXIgaSA9IDA7IGkgPCBhcnJheS5sZW5ndGg7IGkrKykge1xuICAgICAgICBmLmNhbGwoY29udGV4dCB8fCB3aW5kb3csIGFycmF5W2ldLCBpLCBhcnJheSk7XG4gICAgfVxufVxuZnVuY3Rpb24gbWFwKGFycmF5LCBmKSB7XG4gICAgdmFyIHJlc3VsdCA9IFtdO1xuICAgIGZvciAodmFyIGkgPSAwOyBpIDwgYXJyYXkubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgcmVzdWx0LnB1c2goZihhcnJheVtpXSwgaSwgYXJyYXksIHJlc3VsdCkpO1xuICAgIH1cbiAgICByZXR1cm4gcmVzdWx0O1xufVxuZnVuY3Rpb24gbWFwT2JqZWN0KG9iamVjdCwgZikge1xuICAgIHZhciByZXN1bHQgPSB7fTtcbiAgICBvYmplY3RBcHBseShvYmplY3QsIGZ1bmN0aW9uICh2YWx1ZSwga2V5KSB7XG4gICAgICAgIHJlc3VsdFtrZXldID0gZih2YWx1ZSk7XG4gICAgfSk7XG4gICAgcmV0dXJuIHJlc3VsdDtcbn1cbmZ1bmN0aW9uIGZpbHRlcihhcnJheSwgdGVzdCkge1xuICAgIHRlc3QgPVxuICAgICAgICB0ZXN0IHx8XG4gICAgICAgICAgICBmdW5jdGlvbiAodmFsdWUpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gISF2YWx1ZTtcbiAgICAgICAgICAgIH07XG4gICAgdmFyIHJlc3VsdCA9IFtdO1xuICAgIGZvciAodmFyIGkgPSAwOyBpIDwgYXJyYXkubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgaWYgKHRlc3QoYXJyYXlbaV0sIGksIGFycmF5LCByZXN1bHQpKSB7XG4gICAgICAgICAgICByZXN1bHQucHVzaChhcnJheVtpXSk7XG4gICAgICAgIH1cbiAgICB9XG4gICAgcmV0dXJuIHJlc3VsdDtcbn1cbmZ1bmN0aW9uIGZpbHRlck9iamVjdChvYmplY3QsIHRlc3QpIHtcbiAgICB2YXIgcmVzdWx0ID0ge307XG4gICAgb2JqZWN0QXBwbHkob2JqZWN0LCBmdW5jdGlvbiAodmFsdWUsIGtleSkge1xuICAgICAgICBpZiAoKHRlc3QgJiYgdGVzdCh2YWx1ZSwga2V5LCBvYmplY3QsIHJlc3VsdCkpIHx8IEJvb2xlYW4odmFsdWUpKSB7XG4gICAgICAgICAgICByZXN1bHRba2V5XSA9IHZhbHVlO1xuICAgICAgICB9XG4gICAgfSk7XG4gICAgcmV0dXJuIHJlc3VsdDtcbn1cbmZ1bmN0aW9uIGZsYXR0ZW4ob2JqZWN0KSB7XG4gICAgdmFyIHJlc3VsdCA9IFtdO1xuICAgIG9iamVjdEFwcGx5KG9iamVjdCwgZnVuY3Rpb24gKHZhbHVlLCBrZXkpIHtcbiAgICAgICAgcmVzdWx0LnB1c2goW2tleSwgdmFsdWVdKTtcbiAgICB9KTtcbiAgICByZXR1cm4gcmVzdWx0O1xufVxuZnVuY3Rpb24gYW55KGFycmF5LCB0ZXN0KSB7XG4gICAgZm9yICh2YXIgaSA9IDA7IGkgPCBhcnJheS5sZW5ndGg7IGkrKykge1xuICAgICAgICBpZiAodGVzdChhcnJheVtpXSwgaSwgYXJyYXkpKSB7XG4gICAgICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgICAgfVxuICAgIH1cbiAgICByZXR1cm4gZmFsc2U7XG59XG5mdW5jdGlvbiBjb2xsZWN0aW9uc19hbGwoYXJyYXksIHRlc3QpIHtcbiAgICBmb3IgKHZhciBpID0gMDsgaSA8IGFycmF5Lmxlbmd0aDsgaSsrKSB7XG4gICAgICAgIGlmICghdGVzdChhcnJheVtpXSwgaSwgYXJyYXkpKSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cbiAgICB9XG4gICAgcmV0dXJuIHRydWU7XG59XG5mdW5jdGlvbiBlbmNvZGVQYXJhbXNPYmplY3QoZGF0YSkge1xuICAgIHJldHVybiBtYXBPYmplY3QoZGF0YSwgZnVuY3Rpb24gKHZhbHVlKSB7XG4gICAgICAgIGlmICh0eXBlb2YgdmFsdWUgPT09ICdvYmplY3QnKSB7XG4gICAgICAgICAgICB2YWx1ZSA9IHNhZmVKU09OU3RyaW5naWZ5KHZhbHVlKTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gZW5jb2RlVVJJQ29tcG9uZW50KGVuY29kZSh2YWx1ZS50b1N0cmluZygpKSk7XG4gICAgfSk7XG59XG5mdW5jdGlvbiBidWlsZFF1ZXJ5U3RyaW5nKGRhdGEpIHtcbiAgICB2YXIgcGFyYW1zID0gZmlsdGVyT2JqZWN0KGRhdGEsIGZ1bmN0aW9uICh2YWx1ZSkge1xuICAgICAgICByZXR1cm4gdmFsdWUgIT09IHVuZGVmaW5lZDtcbiAgICB9KTtcbiAgICB2YXIgcXVlcnkgPSBtYXAoZmxhdHRlbihlbmNvZGVQYXJhbXNPYmplY3QocGFyYW1zKSksIHV0aWwubWV0aG9kKCdqb2luJywgJz0nKSkuam9pbignJicpO1xuICAgIHJldHVybiBxdWVyeTtcbn1cbmZ1bmN0aW9uIGRlY3ljbGVPYmplY3Qob2JqZWN0KSB7XG4gICAgdmFyIG9iamVjdHMgPSBbXSwgcGF0aHMgPSBbXTtcbiAgICByZXR1cm4gKGZ1bmN0aW9uIGRlcmV6KHZhbHVlLCBwYXRoKSB7XG4gICAgICAgIHZhciBpLCBuYW1lLCBudTtcbiAgICAgICAgc3dpdGNoICh0eXBlb2YgdmFsdWUpIHtcbiAgICAgICAgICAgIGNhc2UgJ29iamVjdCc6XG4gICAgICAgICAgICAgICAgaWYgKCF2YWx1ZSkge1xuICAgICAgICAgICAgICAgICAgICByZXR1cm4gbnVsbDtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgZm9yIChpID0gMDsgaSA8IG9iamVjdHMubGVuZ3RoOyBpICs9IDEpIHtcbiAgICAgICAgICAgICAgICAgICAgaWYgKG9iamVjdHNbaV0gPT09IHZhbHVlKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4geyAkcmVmOiBwYXRoc1tpXSB9O1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIG9iamVjdHMucHVzaCh2YWx1ZSk7XG4gICAgICAgICAgICAgICAgcGF0aHMucHVzaChwYXRoKTtcbiAgICAgICAgICAgICAgICBpZiAoT2JqZWN0LnByb3RvdHlwZS50b1N0cmluZy5hcHBseSh2YWx1ZSkgPT09ICdbb2JqZWN0IEFycmF5XScpIHtcbiAgICAgICAgICAgICAgICAgICAgbnUgPSBbXTtcbiAgICAgICAgICAgICAgICAgICAgZm9yIChpID0gMDsgaSA8IHZhbHVlLmxlbmd0aDsgaSArPSAxKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBudVtpXSA9IGRlcmV6KHZhbHVlW2ldLCBwYXRoICsgJ1snICsgaSArICddJyk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIG51ID0ge307XG4gICAgICAgICAgICAgICAgICAgIGZvciAobmFtZSBpbiB2YWx1ZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbCh2YWx1ZSwgbmFtZSkpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBudVtuYW1lXSA9IGRlcmV6KHZhbHVlW25hbWVdLCBwYXRoICsgJ1snICsgSlNPTi5zdHJpbmdpZnkobmFtZSkgKyAnXScpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIHJldHVybiBudTtcbiAgICAgICAgICAgIGNhc2UgJ251bWJlcic6XG4gICAgICAgICAgICBjYXNlICdzdHJpbmcnOlxuICAgICAgICAgICAgY2FzZSAnYm9vbGVhbic6XG4gICAgICAgICAgICAgICAgcmV0dXJuIHZhbHVlO1xuICAgICAgICB9XG4gICAgfSkob2JqZWN0LCAnJCcpO1xufVxuZnVuY3Rpb24gc2FmZUpTT05TdHJpbmdpZnkoc291cmNlKSB7XG4gICAgdHJ5IHtcbiAgICAgICAgcmV0dXJuIEpTT04uc3RyaW5naWZ5KHNvdXJjZSk7XG4gICAgfVxuICAgIGNhdGNoIChlKSB7XG4gICAgICAgIHJldHVybiBKU09OLnN0cmluZ2lmeShkZWN5Y2xlT2JqZWN0KHNvdXJjZSkpO1xuICAgIH1cbn1cblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS9sb2dnZXIudHNcblxuXG52YXIgbG9nZ2VyX0xvZ2dlciA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gTG9nZ2VyKCkge1xuICAgICAgICB0aGlzLmdsb2JhbExvZyA9IGZ1bmN0aW9uIChtZXNzYWdlKSB7XG4gICAgICAgICAgICBpZiAod2luZG93LmNvbnNvbGUgJiYgd2luZG93LmNvbnNvbGUubG9nKSB7XG4gICAgICAgICAgICAgICAgd2luZG93LmNvbnNvbGUubG9nKG1lc3NhZ2UpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9O1xuICAgIH1cbiAgICBMb2dnZXIucHJvdG90eXBlLmRlYnVnID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgYXJncyA9IFtdO1xuICAgICAgICBmb3IgKHZhciBfaSA9IDA7IF9pIDwgYXJndW1lbnRzLmxlbmd0aDsgX2krKykge1xuICAgICAgICAgICAgYXJnc1tfaV0gPSBhcmd1bWVudHNbX2ldO1xuICAgICAgICB9XG4gICAgICAgIHRoaXMubG9nKHRoaXMuZ2xvYmFsTG9nLCBhcmdzKTtcbiAgICB9O1xuICAgIExvZ2dlci5wcm90b3R5cGUud2FybiA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIGFyZ3MgPSBbXTtcbiAgICAgICAgZm9yICh2YXIgX2kgPSAwOyBfaSA8IGFyZ3VtZW50cy5sZW5ndGg7IF9pKyspIHtcbiAgICAgICAgICAgIGFyZ3NbX2ldID0gYXJndW1lbnRzW19pXTtcbiAgICAgICAgfVxuICAgICAgICB0aGlzLmxvZyh0aGlzLmdsb2JhbExvZ1dhcm4sIGFyZ3MpO1xuICAgIH07XG4gICAgTG9nZ2VyLnByb3RvdHlwZS5lcnJvciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIGFyZ3MgPSBbXTtcbiAgICAgICAgZm9yICh2YXIgX2kgPSAwOyBfaSA8IGFyZ3VtZW50cy5sZW5ndGg7IF9pKyspIHtcbiAgICAgICAgICAgIGFyZ3NbX2ldID0gYXJndW1lbnRzW19pXTtcbiAgICAgICAgfVxuICAgICAgICB0aGlzLmxvZyh0aGlzLmdsb2JhbExvZ0Vycm9yLCBhcmdzKTtcbiAgICB9O1xuICAgIExvZ2dlci5wcm90b3R5cGUuZ2xvYmFsTG9nV2FybiA9IGZ1bmN0aW9uIChtZXNzYWdlKSB7XG4gICAgICAgIGlmICh3aW5kb3cuY29uc29sZSAmJiB3aW5kb3cuY29uc29sZS53YXJuKSB7XG4gICAgICAgICAgICB3aW5kb3cuY29uc29sZS53YXJuKG1lc3NhZ2UpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgdGhpcy5nbG9iYWxMb2cobWVzc2FnZSk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIExvZ2dlci5wcm90b3R5cGUuZ2xvYmFsTG9nRXJyb3IgPSBmdW5jdGlvbiAobWVzc2FnZSkge1xuICAgICAgICBpZiAod2luZG93LmNvbnNvbGUgJiYgd2luZG93LmNvbnNvbGUuZXJyb3IpIHtcbiAgICAgICAgICAgIHdpbmRvdy5jb25zb2xlLmVycm9yKG1lc3NhZ2UpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgdGhpcy5nbG9iYWxMb2dXYXJuKG1lc3NhZ2UpO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBMb2dnZXIucHJvdG90eXBlLmxvZyA9IGZ1bmN0aW9uIChkZWZhdWx0TG9nZ2luZ0Z1bmN0aW9uKSB7XG4gICAgICAgIHZhciBhcmdzID0gW107XG4gICAgICAgIGZvciAodmFyIF9pID0gMTsgX2kgPCBhcmd1bWVudHMubGVuZ3RoOyBfaSsrKSB7XG4gICAgICAgICAgICBhcmdzW19pIC0gMV0gPSBhcmd1bWVudHNbX2ldO1xuICAgICAgICB9XG4gICAgICAgIHZhciBtZXNzYWdlID0gc3RyaW5naWZ5LmFwcGx5KHRoaXMsIGFyZ3VtZW50cyk7XG4gICAgICAgIGlmIChjb3JlX3B1c2hlci5sb2cpIHtcbiAgICAgICAgICAgIGNvcmVfcHVzaGVyLmxvZyhtZXNzYWdlKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIGlmIChjb3JlX3B1c2hlci5sb2dUb0NvbnNvbGUpIHtcbiAgICAgICAgICAgIHZhciBsb2cgPSBkZWZhdWx0TG9nZ2luZ0Z1bmN0aW9uLmJpbmQodGhpcyk7XG4gICAgICAgICAgICBsb2cobWVzc2FnZSk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIHJldHVybiBMb2dnZXI7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgbG9nZ2VyID0gKG5ldyBsb2dnZXJfTG9nZ2VyKCkpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9ydW50aW1lcy93ZWIvYXV0aC9qc29ucF9hdXRoLnRzXG5cbnZhciBqc29ucCA9IGZ1bmN0aW9uIChjb250ZXh0LCBzb2NrZXRJZCwgY2FsbGJhY2spIHtcbiAgICBpZiAodGhpcy5hdXRoT3B0aW9ucy5oZWFkZXJzICE9PSB1bmRlZmluZWQpIHtcbiAgICAgICAgbG9nZ2VyLndhcm4oJ1RvIHNlbmQgaGVhZGVycyB3aXRoIHRoZSBhdXRoIHJlcXVlc3QsIHlvdSBtdXN0IHVzZSBBSkFYLCByYXRoZXIgdGhhbiBKU09OUC4nKTtcbiAgICB9XG4gICAgdmFyIGNhbGxiYWNrTmFtZSA9IGNvbnRleHQubmV4dEF1dGhDYWxsYmFja0lELnRvU3RyaW5nKCk7XG4gICAgY29udGV4dC5uZXh0QXV0aENhbGxiYWNrSUQrKztcbiAgICB2YXIgZG9jdW1lbnQgPSBjb250ZXh0LmdldERvY3VtZW50KCk7XG4gICAgdmFyIHNjcmlwdCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3NjcmlwdCcpO1xuICAgIGNvbnRleHQuYXV0aF9jYWxsYmFja3NbY2FsbGJhY2tOYW1lXSA9IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgIGNhbGxiYWNrKG51bGwsIGRhdGEpO1xuICAgIH07XG4gICAgdmFyIGNhbGxiYWNrX25hbWUgPSBcIlB1c2hlci5hdXRoX2NhbGxiYWNrc1snXCIgKyBjYWxsYmFja05hbWUgKyBcIiddXCI7XG4gICAgc2NyaXB0LnNyYyA9XG4gICAgICAgIHRoaXMub3B0aW9ucy5hdXRoRW5kcG9pbnQgK1xuICAgICAgICAgICAgJz9jYWxsYmFjaz0nICtcbiAgICAgICAgICAgIGVuY29kZVVSSUNvbXBvbmVudChjYWxsYmFja19uYW1lKSArXG4gICAgICAgICAgICAnJicgK1xuICAgICAgICAgICAgdGhpcy5jb21wb3NlUXVlcnkoc29ja2V0SWQpO1xuICAgIHZhciBoZWFkID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoJ2hlYWQnKVswXSB8fCBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQ7XG4gICAgaGVhZC5pbnNlcnRCZWZvcmUoc2NyaXB0LCBoZWFkLmZpcnN0Q2hpbGQpO1xufTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIGpzb25wX2F1dGggPSAoanNvbnApO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9ydW50aW1lcy93ZWIvZG9tL3NjcmlwdF9yZXF1ZXN0LnRzXG52YXIgU2NyaXB0UmVxdWVzdCA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gU2NyaXB0UmVxdWVzdChzcmMpIHtcbiAgICAgICAgdGhpcy5zcmMgPSBzcmM7XG4gICAgfVxuICAgIFNjcmlwdFJlcXVlc3QucHJvdG90eXBlLnNlbmQgPSBmdW5jdGlvbiAocmVjZWl2ZXIpIHtcbiAgICAgICAgdmFyIHNlbGYgPSB0aGlzO1xuICAgICAgICB2YXIgZXJyb3JTdHJpbmcgPSAnRXJyb3IgbG9hZGluZyAnICsgc2VsZi5zcmM7XG4gICAgICAgIHNlbGYuc2NyaXB0ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnc2NyaXB0Jyk7XG4gICAgICAgIHNlbGYuc2NyaXB0LmlkID0gcmVjZWl2ZXIuaWQ7XG4gICAgICAgIHNlbGYuc2NyaXB0LnNyYyA9IHNlbGYuc3JjO1xuICAgICAgICBzZWxmLnNjcmlwdC50eXBlID0gJ3RleHQvamF2YXNjcmlwdCc7XG4gICAgICAgIHNlbGYuc2NyaXB0LmNoYXJzZXQgPSAnVVRGLTgnO1xuICAgICAgICBpZiAoc2VsZi5zY3JpcHQuYWRkRXZlbnRMaXN0ZW5lcikge1xuICAgICAgICAgICAgc2VsZi5zY3JpcHQub25lcnJvciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICByZWNlaXZlci5jYWxsYmFjayhlcnJvclN0cmluZyk7XG4gICAgICAgICAgICB9O1xuICAgICAgICAgICAgc2VsZi5zY3JpcHQub25sb2FkID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIHJlY2VpdmVyLmNhbGxiYWNrKG51bGwpO1xuICAgICAgICAgICAgfTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHNlbGYuc2NyaXB0Lm9ucmVhZHlzdGF0ZWNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBpZiAoc2VsZi5zY3JpcHQucmVhZHlTdGF0ZSA9PT0gJ2xvYWRlZCcgfHxcbiAgICAgICAgICAgICAgICAgICAgc2VsZi5zY3JpcHQucmVhZHlTdGF0ZSA9PT0gJ2NvbXBsZXRlJykge1xuICAgICAgICAgICAgICAgICAgICByZWNlaXZlci5jYWxsYmFjayhudWxsKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9O1xuICAgICAgICB9XG4gICAgICAgIGlmIChzZWxmLnNjcmlwdC5hc3luYyA9PT0gdW5kZWZpbmVkICYmXG4gICAgICAgICAgICBkb2N1bWVudC5hdHRhY2hFdmVudCAmJlxuICAgICAgICAgICAgL29wZXJhL2kudGVzdChuYXZpZ2F0b3IudXNlckFnZW50KSkge1xuICAgICAgICAgICAgc2VsZi5lcnJvclNjcmlwdCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ3NjcmlwdCcpO1xuICAgICAgICAgICAgc2VsZi5lcnJvclNjcmlwdC5pZCA9IHJlY2VpdmVyLmlkICsgJ19lcnJvcic7XG4gICAgICAgICAgICBzZWxmLmVycm9yU2NyaXB0LnRleHQgPSByZWNlaXZlci5uYW1lICsgXCIoJ1wiICsgZXJyb3JTdHJpbmcgKyBcIicpO1wiO1xuICAgICAgICAgICAgc2VsZi5zY3JpcHQuYXN5bmMgPSBzZWxmLmVycm9yU2NyaXB0LmFzeW5jID0gZmFsc2U7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICBzZWxmLnNjcmlwdC5hc3luYyA9IHRydWU7XG4gICAgICAgIH1cbiAgICAgICAgdmFyIGhlYWQgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5VGFnTmFtZSgnaGVhZCcpWzBdO1xuICAgICAgICBoZWFkLmluc2VydEJlZm9yZShzZWxmLnNjcmlwdCwgaGVhZC5maXJzdENoaWxkKTtcbiAgICAgICAgaWYgKHNlbGYuZXJyb3JTY3JpcHQpIHtcbiAgICAgICAgICAgIGhlYWQuaW5zZXJ0QmVmb3JlKHNlbGYuZXJyb3JTY3JpcHQsIHNlbGYuc2NyaXB0Lm5leHRTaWJsaW5nKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgU2NyaXB0UmVxdWVzdC5wcm90b3R5cGUuY2xlYW51cCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMuc2NyaXB0KSB7XG4gICAgICAgICAgICB0aGlzLnNjcmlwdC5vbmxvYWQgPSB0aGlzLnNjcmlwdC5vbmVycm9yID0gbnVsbDtcbiAgICAgICAgICAgIHRoaXMuc2NyaXB0Lm9ucmVhZHlzdGF0ZWNoYW5nZSA9IG51bGw7XG4gICAgICAgIH1cbiAgICAgICAgaWYgKHRoaXMuc2NyaXB0ICYmIHRoaXMuc2NyaXB0LnBhcmVudE5vZGUpIHtcbiAgICAgICAgICAgIHRoaXMuc2NyaXB0LnBhcmVudE5vZGUucmVtb3ZlQ2hpbGQodGhpcy5zY3JpcHQpO1xuICAgICAgICB9XG4gICAgICAgIGlmICh0aGlzLmVycm9yU2NyaXB0ICYmIHRoaXMuZXJyb3JTY3JpcHQucGFyZW50Tm9kZSkge1xuICAgICAgICAgICAgdGhpcy5lcnJvclNjcmlwdC5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHRoaXMuZXJyb3JTY3JpcHQpO1xuICAgICAgICB9XG4gICAgICAgIHRoaXMuc2NyaXB0ID0gbnVsbDtcbiAgICAgICAgdGhpcy5lcnJvclNjcmlwdCA9IG51bGw7XG4gICAgfTtcbiAgICByZXR1cm4gU2NyaXB0UmVxdWVzdDtcbn0oKSk7XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciBzY3JpcHRfcmVxdWVzdCA9IChTY3JpcHRSZXF1ZXN0KTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvcnVudGltZXMvd2ViL2RvbS9qc29ucF9yZXF1ZXN0LnRzXG5cblxudmFyIGpzb25wX3JlcXVlc3RfSlNPTlBSZXF1ZXN0ID0gKGZ1bmN0aW9uICgpIHtcbiAgICBmdW5jdGlvbiBKU09OUFJlcXVlc3QodXJsLCBkYXRhKSB7XG4gICAgICAgIHRoaXMudXJsID0gdXJsO1xuICAgICAgICB0aGlzLmRhdGEgPSBkYXRhO1xuICAgIH1cbiAgICBKU09OUFJlcXVlc3QucHJvdG90eXBlLnNlbmQgPSBmdW5jdGlvbiAocmVjZWl2ZXIpIHtcbiAgICAgICAgaWYgKHRoaXMucmVxdWVzdCkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG4gICAgICAgIHZhciBxdWVyeSA9IGJ1aWxkUXVlcnlTdHJpbmcodGhpcy5kYXRhKTtcbiAgICAgICAgdmFyIHVybCA9IHRoaXMudXJsICsgJy8nICsgcmVjZWl2ZXIubnVtYmVyICsgJz8nICsgcXVlcnk7XG4gICAgICAgIHRoaXMucmVxdWVzdCA9IHJ1bnRpbWUuY3JlYXRlU2NyaXB0UmVxdWVzdCh1cmwpO1xuICAgICAgICB0aGlzLnJlcXVlc3Quc2VuZChyZWNlaXZlcik7XG4gICAgfTtcbiAgICBKU09OUFJlcXVlc3QucHJvdG90eXBlLmNsZWFudXAgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmICh0aGlzLnJlcXVlc3QpIHtcbiAgICAgICAgICAgIHRoaXMucmVxdWVzdC5jbGVhbnVwKCk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIHJldHVybiBKU09OUFJlcXVlc3Q7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIganNvbnBfcmVxdWVzdCA9IChqc29ucF9yZXF1ZXN0X0pTT05QUmVxdWVzdCk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL3J1bnRpbWVzL3dlYi90aW1lbGluZS9qc29ucF90aW1lbGluZS50c1xuXG5cbnZhciBnZXRBZ2VudCA9IGZ1bmN0aW9uIChzZW5kZXIsIHVzZVRMUykge1xuICAgIHJldHVybiBmdW5jdGlvbiAoZGF0YSwgY2FsbGJhY2spIHtcbiAgICAgICAgdmFyIHNjaGVtZSA9ICdodHRwJyArICh1c2VUTFMgPyAncycgOiAnJykgKyAnOi8vJztcbiAgICAgICAgdmFyIHVybCA9IHNjaGVtZSArIChzZW5kZXIuaG9zdCB8fCBzZW5kZXIub3B0aW9ucy5ob3N0KSArIHNlbmRlci5vcHRpb25zLnBhdGg7XG4gICAgICAgIHZhciByZXF1ZXN0ID0gcnVudGltZS5jcmVhdGVKU09OUFJlcXVlc3QodXJsLCBkYXRhKTtcbiAgICAgICAgdmFyIHJlY2VpdmVyID0gcnVudGltZS5TY3JpcHRSZWNlaXZlcnMuY3JlYXRlKGZ1bmN0aW9uIChlcnJvciwgcmVzdWx0KSB7XG4gICAgICAgICAgICBTY3JpcHRSZWNlaXZlcnMucmVtb3ZlKHJlY2VpdmVyKTtcbiAgICAgICAgICAgIHJlcXVlc3QuY2xlYW51cCgpO1xuICAgICAgICAgICAgaWYgKHJlc3VsdCAmJiByZXN1bHQuaG9zdCkge1xuICAgICAgICAgICAgICAgIHNlbmRlci5ob3N0ID0gcmVzdWx0Lmhvc3Q7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBpZiAoY2FsbGJhY2spIHtcbiAgICAgICAgICAgICAgICBjYWxsYmFjayhlcnJvciwgcmVzdWx0KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICAgIHJlcXVlc3Quc2VuZChyZWNlaXZlcik7XG4gICAgfTtcbn07XG52YXIganNvbnBfdGltZWxpbmVfanNvbnAgPSB7XG4gICAgbmFtZTogJ2pzb25wJyxcbiAgICBnZXRBZ2VudDogZ2V0QWdlbnRcbn07XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciBqc29ucF90aW1lbGluZSA9IChqc29ucF90aW1lbGluZV9qc29ucCk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvdHJhbnNwb3J0cy91cmxfc2NoZW1lcy50c1xuXG5mdW5jdGlvbiBnZXRHZW5lcmljVVJMKGJhc2VTY2hlbWUsIHBhcmFtcywgcGF0aCkge1xuICAgIHZhciBzY2hlbWUgPSBiYXNlU2NoZW1lICsgKHBhcmFtcy51c2VUTFMgPyAncycgOiAnJyk7XG4gICAgdmFyIGhvc3QgPSBwYXJhbXMudXNlVExTID8gcGFyYW1zLmhvc3RUTFMgOiBwYXJhbXMuaG9zdE5vblRMUztcbiAgICByZXR1cm4gc2NoZW1lICsgJzovLycgKyBob3N0ICsgcGF0aDtcbn1cbmZ1bmN0aW9uIGdldEdlbmVyaWNQYXRoKGtleSwgcXVlcnlTdHJpbmcpIHtcbiAgICB2YXIgcGF0aCA9ICcvYXBwLycgKyBrZXk7XG4gICAgdmFyIHF1ZXJ5ID0gJz9wcm90b2NvbD0nICtcbiAgICAgICAgZGVmYXVsdHMuUFJPVE9DT0wgK1xuICAgICAgICAnJmNsaWVudD1qcycgK1xuICAgICAgICAnJnZlcnNpb249JyArXG4gICAgICAgIGRlZmF1bHRzLlZFUlNJT04gK1xuICAgICAgICAocXVlcnlTdHJpbmcgPyAnJicgKyBxdWVyeVN0cmluZyA6ICcnKTtcbiAgICByZXR1cm4gcGF0aCArIHF1ZXJ5O1xufVxudmFyIHdzID0ge1xuICAgIGdldEluaXRpYWw6IGZ1bmN0aW9uIChrZXksIHBhcmFtcykge1xuICAgICAgICB2YXIgcGF0aCA9IChwYXJhbXMuaHR0cFBhdGggfHwgJycpICsgZ2V0R2VuZXJpY1BhdGgoa2V5LCAnZmxhc2g9ZmFsc2UnKTtcbiAgICAgICAgcmV0dXJuIGdldEdlbmVyaWNVUkwoJ3dzJywgcGFyYW1zLCBwYXRoKTtcbiAgICB9XG59O1xudmFyIGh0dHAgPSB7XG4gICAgZ2V0SW5pdGlhbDogZnVuY3Rpb24gKGtleSwgcGFyYW1zKSB7XG4gICAgICAgIHZhciBwYXRoID0gKHBhcmFtcy5odHRwUGF0aCB8fCAnL3B1c2hlcicpICsgZ2V0R2VuZXJpY1BhdGgoa2V5KTtcbiAgICAgICAgcmV0dXJuIGdldEdlbmVyaWNVUkwoJ2h0dHAnLCBwYXJhbXMsIHBhdGgpO1xuICAgIH1cbn07XG52YXIgc29ja2pzID0ge1xuICAgIGdldEluaXRpYWw6IGZ1bmN0aW9uIChrZXksIHBhcmFtcykge1xuICAgICAgICByZXR1cm4gZ2V0R2VuZXJpY1VSTCgnaHR0cCcsIHBhcmFtcywgcGFyYW1zLmh0dHBQYXRoIHx8ICcvcHVzaGVyJyk7XG4gICAgfSxcbiAgICBnZXRQYXRoOiBmdW5jdGlvbiAoa2V5LCBwYXJhbXMpIHtcbiAgICAgICAgcmV0dXJuIGdldEdlbmVyaWNQYXRoKGtleSk7XG4gICAgfVxufTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS9ldmVudHMvY2FsbGJhY2tfcmVnaXN0cnkudHNcblxudmFyIGNhbGxiYWNrX3JlZ2lzdHJ5X0NhbGxiYWNrUmVnaXN0cnkgPSAoZnVuY3Rpb24gKCkge1xuICAgIGZ1bmN0aW9uIENhbGxiYWNrUmVnaXN0cnkoKSB7XG4gICAgICAgIHRoaXMuX2NhbGxiYWNrcyA9IHt9O1xuICAgIH1cbiAgICBDYWxsYmFja1JlZ2lzdHJ5LnByb3RvdHlwZS5nZXQgPSBmdW5jdGlvbiAobmFtZSkge1xuICAgICAgICByZXR1cm4gdGhpcy5fY2FsbGJhY2tzW3ByZWZpeChuYW1lKV07XG4gICAgfTtcbiAgICBDYWxsYmFja1JlZ2lzdHJ5LnByb3RvdHlwZS5hZGQgPSBmdW5jdGlvbiAobmFtZSwgY2FsbGJhY2ssIGNvbnRleHQpIHtcbiAgICAgICAgdmFyIHByZWZpeGVkRXZlbnROYW1lID0gcHJlZml4KG5hbWUpO1xuICAgICAgICB0aGlzLl9jYWxsYmFja3NbcHJlZml4ZWRFdmVudE5hbWVdID1cbiAgICAgICAgICAgIHRoaXMuX2NhbGxiYWNrc1twcmVmaXhlZEV2ZW50TmFtZV0gfHwgW107XG4gICAgICAgIHRoaXMuX2NhbGxiYWNrc1twcmVmaXhlZEV2ZW50TmFtZV0ucHVzaCh7XG4gICAgICAgICAgICBmbjogY2FsbGJhY2ssXG4gICAgICAgICAgICBjb250ZXh0OiBjb250ZXh0XG4gICAgICAgIH0pO1xuICAgIH07XG4gICAgQ2FsbGJhY2tSZWdpc3RyeS5wcm90b3R5cGUucmVtb3ZlID0gZnVuY3Rpb24gKG5hbWUsIGNhbGxiYWNrLCBjb250ZXh0KSB7XG4gICAgICAgIGlmICghbmFtZSAmJiAhY2FsbGJhY2sgJiYgIWNvbnRleHQpIHtcbiAgICAgICAgICAgIHRoaXMuX2NhbGxiYWNrcyA9IHt9O1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG4gICAgICAgIHZhciBuYW1lcyA9IG5hbWUgPyBbcHJlZml4KG5hbWUpXSA6IGtleXModGhpcy5fY2FsbGJhY2tzKTtcbiAgICAgICAgaWYgKGNhbGxiYWNrIHx8IGNvbnRleHQpIHtcbiAgICAgICAgICAgIHRoaXMucmVtb3ZlQ2FsbGJhY2sobmFtZXMsIGNhbGxiYWNrLCBjb250ZXh0KTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHRoaXMucmVtb3ZlQWxsQ2FsbGJhY2tzKG5hbWVzKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgQ2FsbGJhY2tSZWdpc3RyeS5wcm90b3R5cGUucmVtb3ZlQ2FsbGJhY2sgPSBmdW5jdGlvbiAobmFtZXMsIGNhbGxiYWNrLCBjb250ZXh0KSB7XG4gICAgICAgIGFwcGx5KG5hbWVzLCBmdW5jdGlvbiAobmFtZSkge1xuICAgICAgICAgICAgdGhpcy5fY2FsbGJhY2tzW25hbWVdID0gZmlsdGVyKHRoaXMuX2NhbGxiYWNrc1tuYW1lXSB8fCBbXSwgZnVuY3Rpb24gKGJpbmRpbmcpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gKChjYWxsYmFjayAmJiBjYWxsYmFjayAhPT0gYmluZGluZy5mbikgfHxcbiAgICAgICAgICAgICAgICAgICAgKGNvbnRleHQgJiYgY29udGV4dCAhPT0gYmluZGluZy5jb250ZXh0KSk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIGlmICh0aGlzLl9jYWxsYmFja3NbbmFtZV0ubGVuZ3RoID09PSAwKSB7XG4gICAgICAgICAgICAgICAgZGVsZXRlIHRoaXMuX2NhbGxiYWNrc1tuYW1lXTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSwgdGhpcyk7XG4gICAgfTtcbiAgICBDYWxsYmFja1JlZ2lzdHJ5LnByb3RvdHlwZS5yZW1vdmVBbGxDYWxsYmFja3MgPSBmdW5jdGlvbiAobmFtZXMpIHtcbiAgICAgICAgYXBwbHkobmFtZXMsIGZ1bmN0aW9uIChuYW1lKSB7XG4gICAgICAgICAgICBkZWxldGUgdGhpcy5fY2FsbGJhY2tzW25hbWVdO1xuICAgICAgICB9LCB0aGlzKTtcbiAgICB9O1xuICAgIHJldHVybiBDYWxsYmFja1JlZ2lzdHJ5O1xufSgpKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIGNhbGxiYWNrX3JlZ2lzdHJ5ID0gKGNhbGxiYWNrX3JlZ2lzdHJ5X0NhbGxiYWNrUmVnaXN0cnkpO1xuZnVuY3Rpb24gcHJlZml4KG5hbWUpIHtcbiAgICByZXR1cm4gJ18nICsgbmFtZTtcbn1cblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS9ldmVudHMvZGlzcGF0Y2hlci50c1xuXG5cbnZhciBkaXNwYXRjaGVyX0Rpc3BhdGNoZXIgPSAoZnVuY3Rpb24gKCkge1xuICAgIGZ1bmN0aW9uIERpc3BhdGNoZXIoZmFpbFRocm91Z2gpIHtcbiAgICAgICAgdGhpcy5jYWxsYmFja3MgPSBuZXcgY2FsbGJhY2tfcmVnaXN0cnkoKTtcbiAgICAgICAgdGhpcy5nbG9iYWxfY2FsbGJhY2tzID0gW107XG4gICAgICAgIHRoaXMuZmFpbFRocm91Z2ggPSBmYWlsVGhyb3VnaDtcbiAgICB9XG4gICAgRGlzcGF0Y2hlci5wcm90b3R5cGUuYmluZCA9IGZ1bmN0aW9uIChldmVudE5hbWUsIGNhbGxiYWNrLCBjb250ZXh0KSB7XG4gICAgICAgIHRoaXMuY2FsbGJhY2tzLmFkZChldmVudE5hbWUsIGNhbGxiYWNrLCBjb250ZXh0KTtcbiAgICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfTtcbiAgICBEaXNwYXRjaGVyLnByb3RvdHlwZS5iaW5kX2dsb2JhbCA9IGZ1bmN0aW9uIChjYWxsYmFjaykge1xuICAgICAgICB0aGlzLmdsb2JhbF9jYWxsYmFja3MucHVzaChjYWxsYmFjayk7XG4gICAgICAgIHJldHVybiB0aGlzO1xuICAgIH07XG4gICAgRGlzcGF0Y2hlci5wcm90b3R5cGUudW5iaW5kID0gZnVuY3Rpb24gKGV2ZW50TmFtZSwgY2FsbGJhY2ssIGNvbnRleHQpIHtcbiAgICAgICAgdGhpcy5jYWxsYmFja3MucmVtb3ZlKGV2ZW50TmFtZSwgY2FsbGJhY2ssIGNvbnRleHQpO1xuICAgICAgICByZXR1cm4gdGhpcztcbiAgICB9O1xuICAgIERpc3BhdGNoZXIucHJvdG90eXBlLnVuYmluZF9nbG9iYWwgPSBmdW5jdGlvbiAoY2FsbGJhY2spIHtcbiAgICAgICAgaWYgKCFjYWxsYmFjaykge1xuICAgICAgICAgICAgdGhpcy5nbG9iYWxfY2FsbGJhY2tzID0gW107XG4gICAgICAgICAgICByZXR1cm4gdGhpcztcbiAgICAgICAgfVxuICAgICAgICB0aGlzLmdsb2JhbF9jYWxsYmFja3MgPSBmaWx0ZXIodGhpcy5nbG9iYWxfY2FsbGJhY2tzIHx8IFtdLCBmdW5jdGlvbiAoYykgeyByZXR1cm4gYyAhPT0gY2FsbGJhY2s7IH0pO1xuICAgICAgICByZXR1cm4gdGhpcztcbiAgICB9O1xuICAgIERpc3BhdGNoZXIucHJvdG90eXBlLnVuYmluZF9hbGwgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMudW5iaW5kKCk7XG4gICAgICAgIHRoaXMudW5iaW5kX2dsb2JhbCgpO1xuICAgICAgICByZXR1cm4gdGhpcztcbiAgICB9O1xuICAgIERpc3BhdGNoZXIucHJvdG90eXBlLmVtaXQgPSBmdW5jdGlvbiAoZXZlbnROYW1lLCBkYXRhLCBtZXRhZGF0YSkge1xuICAgICAgICBmb3IgKHZhciBpID0gMDsgaSA8IHRoaXMuZ2xvYmFsX2NhbGxiYWNrcy5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgdGhpcy5nbG9iYWxfY2FsbGJhY2tzW2ldKGV2ZW50TmFtZSwgZGF0YSk7XG4gICAgICAgIH1cbiAgICAgICAgdmFyIGNhbGxiYWNrcyA9IHRoaXMuY2FsbGJhY2tzLmdldChldmVudE5hbWUpO1xuICAgICAgICB2YXIgYXJncyA9IFtdO1xuICAgICAgICBpZiAobWV0YWRhdGEpIHtcbiAgICAgICAgICAgIGFyZ3MucHVzaChkYXRhLCBtZXRhZGF0YSk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAoZGF0YSkge1xuICAgICAgICAgICAgYXJncy5wdXNoKGRhdGEpO1xuICAgICAgICB9XG4gICAgICAgIGlmIChjYWxsYmFja3MgJiYgY2FsbGJhY2tzLmxlbmd0aCA+IDApIHtcbiAgICAgICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgY2FsbGJhY2tzLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICAgICAgY2FsbGJhY2tzW2ldLmZuLmFwcGx5KGNhbGxiYWNrc1tpXS5jb250ZXh0IHx8IHdpbmRvdywgYXJncyk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAodGhpcy5mYWlsVGhyb3VnaCkge1xuICAgICAgICAgICAgdGhpcy5mYWlsVGhyb3VnaChldmVudE5hbWUsIGRhdGEpO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiB0aGlzO1xuICAgIH07XG4gICAgcmV0dXJuIERpc3BhdGNoZXI7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgZGlzcGF0Y2hlciA9IChkaXNwYXRjaGVyX0Rpc3BhdGNoZXIpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3RyYW5zcG9ydHMvdHJhbnNwb3J0X2Nvbm5lY3Rpb24udHNcbnZhciB0cmFuc3BvcnRfY29ubmVjdGlvbl9leHRlbmRzID0gKHVuZGVmaW5lZCAmJiB1bmRlZmluZWQuX19leHRlbmRzKSB8fCAoZnVuY3Rpb24gKCkge1xuICAgIHZhciBleHRlbmRTdGF0aWNzID0gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiB8fFxuICAgICAgICAgICAgKHsgX19wcm90b19fOiBbXSB9IGluc3RhbmNlb2YgQXJyYXkgJiYgZnVuY3Rpb24gKGQsIGIpIHsgZC5fX3Byb3RvX18gPSBiOyB9KSB8fFxuICAgICAgICAgICAgZnVuY3Rpb24gKGQsIGIpIHsgZm9yICh2YXIgcCBpbiBiKSBpZiAoYi5oYXNPd25Qcm9wZXJ0eShwKSkgZFtwXSA9IGJbcF07IH07XG4gICAgICAgIHJldHVybiBleHRlbmRTdGF0aWNzKGQsIGIpO1xuICAgIH07XG4gICAgcmV0dXJuIGZ1bmN0aW9uIChkLCBiKSB7XG4gICAgICAgIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgICAgIGZ1bmN0aW9uIF9fKCkgeyB0aGlzLmNvbnN0cnVjdG9yID0gZDsgfVxuICAgICAgICBkLnByb3RvdHlwZSA9IGIgPT09IG51bGwgPyBPYmplY3QuY3JlYXRlKGIpIDogKF9fLnByb3RvdHlwZSA9IGIucHJvdG90eXBlLCBuZXcgX18oKSk7XG4gICAgfTtcbn0pKCk7XG5cblxuXG5cblxudmFyIHRyYW5zcG9ydF9jb25uZWN0aW9uX1RyYW5zcG9ydENvbm5lY3Rpb24gPSAoZnVuY3Rpb24gKF9zdXBlcikge1xuICAgIHRyYW5zcG9ydF9jb25uZWN0aW9uX2V4dGVuZHMoVHJhbnNwb3J0Q29ubmVjdGlvbiwgX3N1cGVyKTtcbiAgICBmdW5jdGlvbiBUcmFuc3BvcnRDb25uZWN0aW9uKGhvb2tzLCBuYW1lLCBwcmlvcml0eSwga2V5LCBvcHRpb25zKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IF9zdXBlci5jYWxsKHRoaXMpIHx8IHRoaXM7XG4gICAgICAgIF90aGlzLmluaXRpYWxpemUgPSBydW50aW1lLnRyYW5zcG9ydENvbm5lY3Rpb25Jbml0aWFsaXplcjtcbiAgICAgICAgX3RoaXMuaG9va3MgPSBob29rcztcbiAgICAgICAgX3RoaXMubmFtZSA9IG5hbWU7XG4gICAgICAgIF90aGlzLnByaW9yaXR5ID0gcHJpb3JpdHk7XG4gICAgICAgIF90aGlzLmtleSA9IGtleTtcbiAgICAgICAgX3RoaXMub3B0aW9ucyA9IG9wdGlvbnM7XG4gICAgICAgIF90aGlzLnN0YXRlID0gJ25ldyc7XG4gICAgICAgIF90aGlzLnRpbWVsaW5lID0gb3B0aW9ucy50aW1lbGluZTtcbiAgICAgICAgX3RoaXMuYWN0aXZpdHlUaW1lb3V0ID0gb3B0aW9ucy5hY3Rpdml0eVRpbWVvdXQ7XG4gICAgICAgIF90aGlzLmlkID0gX3RoaXMudGltZWxpbmUuZ2VuZXJhdGVVbmlxdWVJRCgpO1xuICAgICAgICByZXR1cm4gX3RoaXM7XG4gICAgfVxuICAgIFRyYW5zcG9ydENvbm5lY3Rpb24ucHJvdG90eXBlLmhhbmRsZXNBY3Rpdml0eUNoZWNrcyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIEJvb2xlYW4odGhpcy5ob29rcy5oYW5kbGVzQWN0aXZpdHlDaGVja3MpO1xuICAgIH07XG4gICAgVHJhbnNwb3J0Q29ubmVjdGlvbi5wcm90b3R5cGUuc3VwcG9ydHNQaW5nID0gZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gQm9vbGVhbih0aGlzLmhvb2tzLnN1cHBvcnRzUGluZyk7XG4gICAgfTtcbiAgICBUcmFuc3BvcnRDb25uZWN0aW9uLnByb3RvdHlwZS5jb25uZWN0ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICBpZiAodGhpcy5zb2NrZXQgfHwgdGhpcy5zdGF0ZSAhPT0gJ2luaXRpYWxpemVkJykge1xuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9XG4gICAgICAgIHZhciB1cmwgPSB0aGlzLmhvb2tzLnVybHMuZ2V0SW5pdGlhbCh0aGlzLmtleSwgdGhpcy5vcHRpb25zKTtcbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgIHRoaXMuc29ja2V0ID0gdGhpcy5ob29rcy5nZXRTb2NrZXQodXJsLCB0aGlzLm9wdGlvbnMpO1xuICAgICAgICB9XG4gICAgICAgIGNhdGNoIChlKSB7XG4gICAgICAgICAgICB1dGlsLmRlZmVyKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5vbkVycm9yKGUpO1xuICAgICAgICAgICAgICAgIF90aGlzLmNoYW5nZVN0YXRlKCdjbG9zZWQnKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICB9XG4gICAgICAgIHRoaXMuYmluZExpc3RlbmVycygpO1xuICAgICAgICBsb2dnZXIuZGVidWcoJ0Nvbm5lY3RpbmcnLCB7IHRyYW5zcG9ydDogdGhpcy5uYW1lLCB1cmw6IHVybCB9KTtcbiAgICAgICAgdGhpcy5jaGFuZ2VTdGF0ZSgnY29ubmVjdGluZycpO1xuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9O1xuICAgIFRyYW5zcG9ydENvbm5lY3Rpb24ucHJvdG90eXBlLmNsb3NlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBpZiAodGhpcy5zb2NrZXQpIHtcbiAgICAgICAgICAgIHRoaXMuc29ja2V0LmNsb3NlKCk7XG4gICAgICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgVHJhbnNwb3J0Q29ubmVjdGlvbi5wcm90b3R5cGUuc2VuZCA9IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIGlmICh0aGlzLnN0YXRlID09PSAnb3BlbicpIHtcbiAgICAgICAgICAgIHV0aWwuZGVmZXIoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIGlmIChfdGhpcy5zb2NrZXQpIHtcbiAgICAgICAgICAgICAgICAgICAgX3RoaXMuc29ja2V0LnNlbmQoZGF0YSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgVHJhbnNwb3J0Q29ubmVjdGlvbi5wcm90b3R5cGUucGluZyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMuc3RhdGUgPT09ICdvcGVuJyAmJiB0aGlzLnN1cHBvcnRzUGluZygpKSB7XG4gICAgICAgICAgICB0aGlzLnNvY2tldC5waW5nKCk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIFRyYW5zcG9ydENvbm5lY3Rpb24ucHJvdG90eXBlLm9uT3BlbiA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMuaG9va3MuYmVmb3JlT3Blbikge1xuICAgICAgICAgICAgdGhpcy5ob29rcy5iZWZvcmVPcGVuKHRoaXMuc29ja2V0LCB0aGlzLmhvb2tzLnVybHMuZ2V0UGF0aCh0aGlzLmtleSwgdGhpcy5vcHRpb25zKSk7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy5jaGFuZ2VTdGF0ZSgnb3BlbicpO1xuICAgICAgICB0aGlzLnNvY2tldC5vbm9wZW4gPSB1bmRlZmluZWQ7XG4gICAgfTtcbiAgICBUcmFuc3BvcnRDb25uZWN0aW9uLnByb3RvdHlwZS5vbkVycm9yID0gZnVuY3Rpb24gKGVycm9yKSB7XG4gICAgICAgIHRoaXMuZW1pdCgnZXJyb3InLCB7IHR5cGU6ICdXZWJTb2NrZXRFcnJvcicsIGVycm9yOiBlcnJvciB9KTtcbiAgICAgICAgdGhpcy50aW1lbGluZS5lcnJvcih0aGlzLmJ1aWxkVGltZWxpbmVNZXNzYWdlKHsgZXJyb3I6IGVycm9yLnRvU3RyaW5nKCkgfSkpO1xuICAgIH07XG4gICAgVHJhbnNwb3J0Q29ubmVjdGlvbi5wcm90b3R5cGUub25DbG9zZSA9IGZ1bmN0aW9uIChjbG9zZUV2ZW50KSB7XG4gICAgICAgIGlmIChjbG9zZUV2ZW50KSB7XG4gICAgICAgICAgICB0aGlzLmNoYW5nZVN0YXRlKCdjbG9zZWQnLCB7XG4gICAgICAgICAgICAgICAgY29kZTogY2xvc2VFdmVudC5jb2RlLFxuICAgICAgICAgICAgICAgIHJlYXNvbjogY2xvc2VFdmVudC5yZWFzb24sXG4gICAgICAgICAgICAgICAgd2FzQ2xlYW46IGNsb3NlRXZlbnQud2FzQ2xlYW5cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgdGhpcy5jaGFuZ2VTdGF0ZSgnY2xvc2VkJyk7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy51bmJpbmRMaXN0ZW5lcnMoKTtcbiAgICAgICAgdGhpcy5zb2NrZXQgPSB1bmRlZmluZWQ7XG4gICAgfTtcbiAgICBUcmFuc3BvcnRDb25uZWN0aW9uLnByb3RvdHlwZS5vbk1lc3NhZ2UgPSBmdW5jdGlvbiAobWVzc2FnZSkge1xuICAgICAgICB0aGlzLmVtaXQoJ21lc3NhZ2UnLCBtZXNzYWdlKTtcbiAgICB9O1xuICAgIFRyYW5zcG9ydENvbm5lY3Rpb24ucHJvdG90eXBlLm9uQWN0aXZpdHkgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMuZW1pdCgnYWN0aXZpdHknKTtcbiAgICB9O1xuICAgIFRyYW5zcG9ydENvbm5lY3Rpb24ucHJvdG90eXBlLmJpbmRMaXN0ZW5lcnMgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIHRoaXMuc29ja2V0Lm9ub3BlbiA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIF90aGlzLm9uT3BlbigpO1xuICAgICAgICB9O1xuICAgICAgICB0aGlzLnNvY2tldC5vbmVycm9yID0gZnVuY3Rpb24gKGVycm9yKSB7XG4gICAgICAgICAgICBfdGhpcy5vbkVycm9yKGVycm9yKTtcbiAgICAgICAgfTtcbiAgICAgICAgdGhpcy5zb2NrZXQub25jbG9zZSA9IGZ1bmN0aW9uIChjbG9zZUV2ZW50KSB7XG4gICAgICAgICAgICBfdGhpcy5vbkNsb3NlKGNsb3NlRXZlbnQpO1xuICAgICAgICB9O1xuICAgICAgICB0aGlzLnNvY2tldC5vbm1lc3NhZ2UgPSBmdW5jdGlvbiAobWVzc2FnZSkge1xuICAgICAgICAgICAgX3RoaXMub25NZXNzYWdlKG1lc3NhZ2UpO1xuICAgICAgICB9O1xuICAgICAgICBpZiAodGhpcy5zdXBwb3J0c1BpbmcoKSkge1xuICAgICAgICAgICAgdGhpcy5zb2NrZXQub25hY3Rpdml0eSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5vbkFjdGl2aXR5KCk7XG4gICAgICAgICAgICB9O1xuICAgICAgICB9XG4gICAgfTtcbiAgICBUcmFuc3BvcnRDb25uZWN0aW9uLnByb3RvdHlwZS51bmJpbmRMaXN0ZW5lcnMgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmICh0aGlzLnNvY2tldCkge1xuICAgICAgICAgICAgdGhpcy5zb2NrZXQub25vcGVuID0gdW5kZWZpbmVkO1xuICAgICAgICAgICAgdGhpcy5zb2NrZXQub25lcnJvciA9IHVuZGVmaW5lZDtcbiAgICAgICAgICAgIHRoaXMuc29ja2V0Lm9uY2xvc2UgPSB1bmRlZmluZWQ7XG4gICAgICAgICAgICB0aGlzLnNvY2tldC5vbm1lc3NhZ2UgPSB1bmRlZmluZWQ7XG4gICAgICAgICAgICBpZiAodGhpcy5zdXBwb3J0c1BpbmcoKSkge1xuICAgICAgICAgICAgICAgIHRoaXMuc29ja2V0Lm9uYWN0aXZpdHkgPSB1bmRlZmluZWQ7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9O1xuICAgIFRyYW5zcG9ydENvbm5lY3Rpb24ucHJvdG90eXBlLmNoYW5nZVN0YXRlID0gZnVuY3Rpb24gKHN0YXRlLCBwYXJhbXMpIHtcbiAgICAgICAgdGhpcy5zdGF0ZSA9IHN0YXRlO1xuICAgICAgICB0aGlzLnRpbWVsaW5lLmluZm8odGhpcy5idWlsZFRpbWVsaW5lTWVzc2FnZSh7XG4gICAgICAgICAgICBzdGF0ZTogc3RhdGUsXG4gICAgICAgICAgICBwYXJhbXM6IHBhcmFtc1xuICAgICAgICB9KSk7XG4gICAgICAgIHRoaXMuZW1pdChzdGF0ZSwgcGFyYW1zKTtcbiAgICB9O1xuICAgIFRyYW5zcG9ydENvbm5lY3Rpb24ucHJvdG90eXBlLmJ1aWxkVGltZWxpbmVNZXNzYWdlID0gZnVuY3Rpb24gKG1lc3NhZ2UpIHtcbiAgICAgICAgcmV0dXJuIGV4dGVuZCh7IGNpZDogdGhpcy5pZCB9LCBtZXNzYWdlKTtcbiAgICB9O1xuICAgIHJldHVybiBUcmFuc3BvcnRDb25uZWN0aW9uO1xufShkaXNwYXRjaGVyKSk7XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciB0cmFuc3BvcnRfY29ubmVjdGlvbiA9ICh0cmFuc3BvcnRfY29ubmVjdGlvbl9UcmFuc3BvcnRDb25uZWN0aW9uKTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS90cmFuc3BvcnRzL3RyYW5zcG9ydC50c1xuXG52YXIgdHJhbnNwb3J0X1RyYW5zcG9ydCA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gVHJhbnNwb3J0KGhvb2tzKSB7XG4gICAgICAgIHRoaXMuaG9va3MgPSBob29rcztcbiAgICB9XG4gICAgVHJhbnNwb3J0LnByb3RvdHlwZS5pc1N1cHBvcnRlZCA9IGZ1bmN0aW9uIChlbnZpcm9ubWVudCkge1xuICAgICAgICByZXR1cm4gdGhpcy5ob29rcy5pc1N1cHBvcnRlZChlbnZpcm9ubWVudCk7XG4gICAgfTtcbiAgICBUcmFuc3BvcnQucHJvdG90eXBlLmNyZWF0ZUNvbm5lY3Rpb24gPSBmdW5jdGlvbiAobmFtZSwgcHJpb3JpdHksIGtleSwgb3B0aW9ucykge1xuICAgICAgICByZXR1cm4gbmV3IHRyYW5zcG9ydF9jb25uZWN0aW9uKHRoaXMuaG9va3MsIG5hbWUsIHByaW9yaXR5LCBrZXksIG9wdGlvbnMpO1xuICAgIH07XG4gICAgcmV0dXJuIFRyYW5zcG9ydDtcbn0oKSk7XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciB0cmFuc3BvcnRzX3RyYW5zcG9ydCA9ICh0cmFuc3BvcnRfVHJhbnNwb3J0KTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvcnVudGltZXMvaXNvbW9ycGhpYy90cmFuc3BvcnRzL3RyYW5zcG9ydHMudHNcblxuXG5cblxudmFyIFdTVHJhbnNwb3J0ID0gbmV3IHRyYW5zcG9ydHNfdHJhbnNwb3J0KHtcbiAgICB1cmxzOiB3cyxcbiAgICBoYW5kbGVzQWN0aXZpdHlDaGVja3M6IGZhbHNlLFxuICAgIHN1cHBvcnRzUGluZzogZmFsc2UsXG4gICAgaXNJbml0aWFsaXplZDogZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gQm9vbGVhbihydW50aW1lLmdldFdlYlNvY2tldEFQSSgpKTtcbiAgICB9LFxuICAgIGlzU3VwcG9ydGVkOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBCb29sZWFuKHJ1bnRpbWUuZ2V0V2ViU29ja2V0QVBJKCkpO1xuICAgIH0sXG4gICAgZ2V0U29ja2V0OiBmdW5jdGlvbiAodXJsKSB7XG4gICAgICAgIHJldHVybiBydW50aW1lLmNyZWF0ZVdlYlNvY2tldCh1cmwpO1xuICAgIH1cbn0pO1xudmFyIGh0dHBDb25maWd1cmF0aW9uID0ge1xuICAgIHVybHM6IGh0dHAsXG4gICAgaGFuZGxlc0FjdGl2aXR5Q2hlY2tzOiBmYWxzZSxcbiAgICBzdXBwb3J0c1Bpbmc6IHRydWUsXG4gICAgaXNJbml0aWFsaXplZDogZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9XG59O1xudmFyIHN0cmVhbWluZ0NvbmZpZ3VyYXRpb24gPSBleHRlbmQoe1xuICAgIGdldFNvY2tldDogZnVuY3Rpb24gKHVybCkge1xuICAgICAgICByZXR1cm4gcnVudGltZS5IVFRQRmFjdG9yeS5jcmVhdGVTdHJlYW1pbmdTb2NrZXQodXJsKTtcbiAgICB9XG59LCBodHRwQ29uZmlndXJhdGlvbik7XG52YXIgcG9sbGluZ0NvbmZpZ3VyYXRpb24gPSBleHRlbmQoe1xuICAgIGdldFNvY2tldDogZnVuY3Rpb24gKHVybCkge1xuICAgICAgICByZXR1cm4gcnVudGltZS5IVFRQRmFjdG9yeS5jcmVhdGVQb2xsaW5nU29ja2V0KHVybCk7XG4gICAgfVxufSwgaHR0cENvbmZpZ3VyYXRpb24pO1xudmFyIHhockNvbmZpZ3VyYXRpb24gPSB7XG4gICAgaXNTdXBwb3J0ZWQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIHJ1bnRpbWUuaXNYSFJTdXBwb3J0ZWQoKTtcbiAgICB9XG59O1xudmFyIFhIUlN0cmVhbWluZ1RyYW5zcG9ydCA9IG5ldyB0cmFuc3BvcnRzX3RyYW5zcG9ydCgoZXh0ZW5kKHt9LCBzdHJlYW1pbmdDb25maWd1cmF0aW9uLCB4aHJDb25maWd1cmF0aW9uKSkpO1xudmFyIFhIUlBvbGxpbmdUcmFuc3BvcnQgPSBuZXcgdHJhbnNwb3J0c190cmFuc3BvcnQoZXh0ZW5kKHt9LCBwb2xsaW5nQ29uZmlndXJhdGlvbiwgeGhyQ29uZmlndXJhdGlvbikpO1xudmFyIFRyYW5zcG9ydHMgPSB7XG4gICAgd3M6IFdTVHJhbnNwb3J0LFxuICAgIHhocl9zdHJlYW1pbmc6IFhIUlN0cmVhbWluZ1RyYW5zcG9ydCxcbiAgICB4aHJfcG9sbGluZzogWEhSUG9sbGluZ1RyYW5zcG9ydFxufTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHRyYW5zcG9ydHMgPSAoVHJhbnNwb3J0cyk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL3J1bnRpbWVzL3dlYi90cmFuc3BvcnRzL3RyYW5zcG9ydHMudHNcblxuXG5cblxuXG5cbnZhciBTb2NrSlNUcmFuc3BvcnQgPSBuZXcgdHJhbnNwb3J0c190cmFuc3BvcnQoe1xuICAgIGZpbGU6ICdzb2NranMnLFxuICAgIHVybHM6IHNvY2tqcyxcbiAgICBoYW5kbGVzQWN0aXZpdHlDaGVja3M6IHRydWUsXG4gICAgc3VwcG9ydHNQaW5nOiBmYWxzZSxcbiAgICBpc1N1cHBvcnRlZDogZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9LFxuICAgIGlzSW5pdGlhbGl6ZWQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIHdpbmRvdy5Tb2NrSlMgIT09IHVuZGVmaW5lZDtcbiAgICB9LFxuICAgIGdldFNvY2tldDogZnVuY3Rpb24gKHVybCwgb3B0aW9ucykge1xuICAgICAgICByZXR1cm4gbmV3IHdpbmRvdy5Tb2NrSlModXJsLCBudWxsLCB7XG4gICAgICAgICAgICBqc19wYXRoOiBEZXBlbmRlbmNpZXMuZ2V0UGF0aCgnc29ja2pzJywge1xuICAgICAgICAgICAgICAgIHVzZVRMUzogb3B0aW9ucy51c2VUTFNcbiAgICAgICAgICAgIH0pLFxuICAgICAgICAgICAgaWdub3JlX251bGxfb3JpZ2luOiBvcHRpb25zLmlnbm9yZU51bGxPcmlnaW5cbiAgICAgICAgfSk7XG4gICAgfSxcbiAgICBiZWZvcmVPcGVuOiBmdW5jdGlvbiAoc29ja2V0LCBwYXRoKSB7XG4gICAgICAgIHNvY2tldC5zZW5kKEpTT04uc3RyaW5naWZ5KHtcbiAgICAgICAgICAgIHBhdGg6IHBhdGhcbiAgICAgICAgfSkpO1xuICAgIH1cbn0pO1xudmFyIHhkckNvbmZpZ3VyYXRpb24gPSB7XG4gICAgaXNTdXBwb3J0ZWQ6IGZ1bmN0aW9uIChlbnZpcm9ubWVudCkge1xuICAgICAgICB2YXIgeWVzID0gcnVudGltZS5pc1hEUlN1cHBvcnRlZChlbnZpcm9ubWVudC51c2VUTFMpO1xuICAgICAgICByZXR1cm4geWVzO1xuICAgIH1cbn07XG52YXIgWERSU3RyZWFtaW5nVHJhbnNwb3J0ID0gbmV3IHRyYW5zcG9ydHNfdHJhbnNwb3J0KChleHRlbmQoe30sIHN0cmVhbWluZ0NvbmZpZ3VyYXRpb24sIHhkckNvbmZpZ3VyYXRpb24pKSk7XG52YXIgWERSUG9sbGluZ1RyYW5zcG9ydCA9IG5ldyB0cmFuc3BvcnRzX3RyYW5zcG9ydChleHRlbmQoe30sIHBvbGxpbmdDb25maWd1cmF0aW9uLCB4ZHJDb25maWd1cmF0aW9uKSk7XG50cmFuc3BvcnRzLnhkcl9zdHJlYW1pbmcgPSBYRFJTdHJlYW1pbmdUcmFuc3BvcnQ7XG50cmFuc3BvcnRzLnhkcl9wb2xsaW5nID0gWERSUG9sbGluZ1RyYW5zcG9ydDtcbnRyYW5zcG9ydHMuc29ja2pzID0gU29ja0pTVHJhbnNwb3J0O1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgdHJhbnNwb3J0c190cmFuc3BvcnRzID0gKHRyYW5zcG9ydHMpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9ydW50aW1lcy93ZWIvbmV0X2luZm8udHNcbnZhciBuZXRfaW5mb19leHRlbmRzID0gKHVuZGVmaW5lZCAmJiB1bmRlZmluZWQuX19leHRlbmRzKSB8fCAoZnVuY3Rpb24gKCkge1xuICAgIHZhciBleHRlbmRTdGF0aWNzID0gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiB8fFxuICAgICAgICAgICAgKHsgX19wcm90b19fOiBbXSB9IGluc3RhbmNlb2YgQXJyYXkgJiYgZnVuY3Rpb24gKGQsIGIpIHsgZC5fX3Byb3RvX18gPSBiOyB9KSB8fFxuICAgICAgICAgICAgZnVuY3Rpb24gKGQsIGIpIHsgZm9yICh2YXIgcCBpbiBiKSBpZiAoYi5oYXNPd25Qcm9wZXJ0eShwKSkgZFtwXSA9IGJbcF07IH07XG4gICAgICAgIHJldHVybiBleHRlbmRTdGF0aWNzKGQsIGIpO1xuICAgIH07XG4gICAgcmV0dXJuIGZ1bmN0aW9uIChkLCBiKSB7XG4gICAgICAgIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgICAgIGZ1bmN0aW9uIF9fKCkgeyB0aGlzLmNvbnN0cnVjdG9yID0gZDsgfVxuICAgICAgICBkLnByb3RvdHlwZSA9IGIgPT09IG51bGwgPyBPYmplY3QuY3JlYXRlKGIpIDogKF9fLnByb3RvdHlwZSA9IGIucHJvdG90eXBlLCBuZXcgX18oKSk7XG4gICAgfTtcbn0pKCk7XG5cbnZhciBOZXRJbmZvID0gKGZ1bmN0aW9uIChfc3VwZXIpIHtcbiAgICBuZXRfaW5mb19leHRlbmRzKE5ldEluZm8sIF9zdXBlcik7XG4gICAgZnVuY3Rpb24gTmV0SW5mbygpIHtcbiAgICAgICAgdmFyIF90aGlzID0gX3N1cGVyLmNhbGwodGhpcykgfHwgdGhpcztcbiAgICAgICAgdmFyIHNlbGYgPSBfdGhpcztcbiAgICAgICAgaWYgKHdpbmRvdy5hZGRFdmVudExpc3RlbmVyICE9PSB1bmRlZmluZWQpIHtcbiAgICAgICAgICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdvbmxpbmUnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgc2VsZi5lbWl0KCdvbmxpbmUnKTtcbiAgICAgICAgICAgIH0sIGZhbHNlKTtcbiAgICAgICAgICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdvZmZsaW5lJywgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIHNlbGYuZW1pdCgnb2ZmbGluZScpO1xuICAgICAgICAgICAgfSwgZmFsc2UpO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiBfdGhpcztcbiAgICB9XG4gICAgTmV0SW5mby5wcm90b3R5cGUuaXNPbmxpbmUgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmICh3aW5kb3cubmF2aWdhdG9yLm9uTGluZSA9PT0gdW5kZWZpbmVkKSB7XG4gICAgICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHJldHVybiB3aW5kb3cubmF2aWdhdG9yLm9uTGluZTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgcmV0dXJuIE5ldEluZm87XG59KGRpc3BhdGNoZXIpKTtcblxudmFyIG5ldF9pbmZvX05ldHdvcmsgPSBuZXcgTmV0SW5mbygpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3RyYW5zcG9ydHMvYXNzaXN0YW50X3RvX3RoZV90cmFuc3BvcnRfbWFuYWdlci50c1xuXG5cbnZhciBhc3Npc3RhbnRfdG9fdGhlX3RyYW5zcG9ydF9tYW5hZ2VyX0Fzc2lzdGFudFRvVGhlVHJhbnNwb3J0TWFuYWdlciA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gQXNzaXN0YW50VG9UaGVUcmFuc3BvcnRNYW5hZ2VyKG1hbmFnZXIsIHRyYW5zcG9ydCwgb3B0aW9ucykge1xuICAgICAgICB0aGlzLm1hbmFnZXIgPSBtYW5hZ2VyO1xuICAgICAgICB0aGlzLnRyYW5zcG9ydCA9IHRyYW5zcG9ydDtcbiAgICAgICAgdGhpcy5taW5QaW5nRGVsYXkgPSBvcHRpb25zLm1pblBpbmdEZWxheTtcbiAgICAgICAgdGhpcy5tYXhQaW5nRGVsYXkgPSBvcHRpb25zLm1heFBpbmdEZWxheTtcbiAgICAgICAgdGhpcy5waW5nRGVsYXkgPSB1bmRlZmluZWQ7XG4gICAgfVxuICAgIEFzc2lzdGFudFRvVGhlVHJhbnNwb3J0TWFuYWdlci5wcm90b3R5cGUuY3JlYXRlQ29ubmVjdGlvbiA9IGZ1bmN0aW9uIChuYW1lLCBwcmlvcml0eSwga2V5LCBvcHRpb25zKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIG9wdGlvbnMgPSBleHRlbmQoe30sIG9wdGlvbnMsIHtcbiAgICAgICAgICAgIGFjdGl2aXR5VGltZW91dDogdGhpcy5waW5nRGVsYXlcbiAgICAgICAgfSk7XG4gICAgICAgIHZhciBjb25uZWN0aW9uID0gdGhpcy50cmFuc3BvcnQuY3JlYXRlQ29ubmVjdGlvbihuYW1lLCBwcmlvcml0eSwga2V5LCBvcHRpb25zKTtcbiAgICAgICAgdmFyIG9wZW5UaW1lc3RhbXAgPSBudWxsO1xuICAgICAgICB2YXIgb25PcGVuID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgY29ubmVjdGlvbi51bmJpbmQoJ29wZW4nLCBvbk9wZW4pO1xuICAgICAgICAgICAgY29ubmVjdGlvbi5iaW5kKCdjbG9zZWQnLCBvbkNsb3NlZCk7XG4gICAgICAgICAgICBvcGVuVGltZXN0YW1wID0gdXRpbC5ub3coKTtcbiAgICAgICAgfTtcbiAgICAgICAgdmFyIG9uQ2xvc2VkID0gZnVuY3Rpb24gKGNsb3NlRXZlbnQpIHtcbiAgICAgICAgICAgIGNvbm5lY3Rpb24udW5iaW5kKCdjbG9zZWQnLCBvbkNsb3NlZCk7XG4gICAgICAgICAgICBpZiAoY2xvc2VFdmVudC5jb2RlID09PSAxMDAyIHx8IGNsb3NlRXZlbnQuY29kZSA9PT0gMTAwMykge1xuICAgICAgICAgICAgICAgIF90aGlzLm1hbmFnZXIucmVwb3J0RGVhdGgoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2UgaWYgKCFjbG9zZUV2ZW50Lndhc0NsZWFuICYmIG9wZW5UaW1lc3RhbXApIHtcbiAgICAgICAgICAgICAgICB2YXIgbGlmZXNwYW4gPSB1dGlsLm5vdygpIC0gb3BlblRpbWVzdGFtcDtcbiAgICAgICAgICAgICAgICBpZiAobGlmZXNwYW4gPCAyICogX3RoaXMubWF4UGluZ0RlbGF5KSB7XG4gICAgICAgICAgICAgICAgICAgIF90aGlzLm1hbmFnZXIucmVwb3J0RGVhdGgoKTtcbiAgICAgICAgICAgICAgICAgICAgX3RoaXMucGluZ0RlbGF5ID0gTWF0aC5tYXgobGlmZXNwYW4gLyAyLCBfdGhpcy5taW5QaW5nRGVsYXkpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cbiAgICAgICAgfTtcbiAgICAgICAgY29ubmVjdGlvbi5iaW5kKCdvcGVuJywgb25PcGVuKTtcbiAgICAgICAgcmV0dXJuIGNvbm5lY3Rpb247XG4gICAgfTtcbiAgICBBc3Npc3RhbnRUb1RoZVRyYW5zcG9ydE1hbmFnZXIucHJvdG90eXBlLmlzU3VwcG9ydGVkID0gZnVuY3Rpb24gKGVudmlyb25tZW50KSB7XG4gICAgICAgIHJldHVybiB0aGlzLm1hbmFnZXIuaXNBbGl2ZSgpICYmIHRoaXMudHJhbnNwb3J0LmlzU3VwcG9ydGVkKGVudmlyb25tZW50KTtcbiAgICB9O1xuICAgIHJldHVybiBBc3Npc3RhbnRUb1RoZVRyYW5zcG9ydE1hbmFnZXI7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgYXNzaXN0YW50X3RvX3RoZV90cmFuc3BvcnRfbWFuYWdlciA9IChhc3Npc3RhbnRfdG9fdGhlX3RyYW5zcG9ydF9tYW5hZ2VyX0Fzc2lzdGFudFRvVGhlVHJhbnNwb3J0TWFuYWdlcik7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvY29ubmVjdGlvbi9wcm90b2NvbC9wcm90b2NvbC50c1xudmFyIFByb3RvY29sID0ge1xuICAgIGRlY29kZU1lc3NhZ2U6IGZ1bmN0aW9uIChtZXNzYWdlRXZlbnQpIHtcbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgIHZhciBtZXNzYWdlRGF0YSA9IEpTT04ucGFyc2UobWVzc2FnZUV2ZW50LmRhdGEpO1xuICAgICAgICAgICAgdmFyIHB1c2hlckV2ZW50RGF0YSA9IG1lc3NhZ2VEYXRhLmRhdGE7XG4gICAgICAgICAgICBpZiAodHlwZW9mIHB1c2hlckV2ZW50RGF0YSA9PT0gJ3N0cmluZycpIHtcbiAgICAgICAgICAgICAgICB0cnkge1xuICAgICAgICAgICAgICAgICAgICBwdXNoZXJFdmVudERhdGEgPSBKU09OLnBhcnNlKG1lc3NhZ2VEYXRhLmRhdGEpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBjYXRjaCAoZSkgeyB9XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICB2YXIgcHVzaGVyRXZlbnQgPSB7XG4gICAgICAgICAgICAgICAgZXZlbnQ6IG1lc3NhZ2VEYXRhLmV2ZW50LFxuICAgICAgICAgICAgICAgIGNoYW5uZWw6IG1lc3NhZ2VEYXRhLmNoYW5uZWwsXG4gICAgICAgICAgICAgICAgZGF0YTogcHVzaGVyRXZlbnREYXRhXG4gICAgICAgICAgICB9O1xuICAgICAgICAgICAgaWYgKG1lc3NhZ2VEYXRhLnVzZXJfaWQpIHtcbiAgICAgICAgICAgICAgICBwdXNoZXJFdmVudC51c2VyX2lkID0gbWVzc2FnZURhdGEudXNlcl9pZDtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIHJldHVybiBwdXNoZXJFdmVudDtcbiAgICAgICAgfVxuICAgICAgICBjYXRjaCAoZSkge1xuICAgICAgICAgICAgdGhyb3cgeyB0eXBlOiAnTWVzc2FnZVBhcnNlRXJyb3InLCBlcnJvcjogZSwgZGF0YTogbWVzc2FnZUV2ZW50LmRhdGEgfTtcbiAgICAgICAgfVxuICAgIH0sXG4gICAgZW5jb2RlTWVzc2FnZTogZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIHJldHVybiBKU09OLnN0cmluZ2lmeShldmVudCk7XG4gICAgfSxcbiAgICBwcm9jZXNzSGFuZHNoYWtlOiBmdW5jdGlvbiAobWVzc2FnZUV2ZW50KSB7XG4gICAgICAgIHZhciBtZXNzYWdlID0gUHJvdG9jb2wuZGVjb2RlTWVzc2FnZShtZXNzYWdlRXZlbnQpO1xuICAgICAgICBpZiAobWVzc2FnZS5ldmVudCA9PT0gJ3B1c2hlcjpjb25uZWN0aW9uX2VzdGFibGlzaGVkJykge1xuICAgICAgICAgICAgaWYgKCFtZXNzYWdlLmRhdGEuYWN0aXZpdHlfdGltZW91dCkge1xuICAgICAgICAgICAgICAgIHRocm93ICdObyBhY3Rpdml0eSB0aW1lb3V0IHNwZWNpZmllZCBpbiBoYW5kc2hha2UnO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgcmV0dXJuIHtcbiAgICAgICAgICAgICAgICBhY3Rpb246ICdjb25uZWN0ZWQnLFxuICAgICAgICAgICAgICAgIGlkOiBtZXNzYWdlLmRhdGEuc29ja2V0X2lkLFxuICAgICAgICAgICAgICAgIGFjdGl2aXR5VGltZW91dDogbWVzc2FnZS5kYXRhLmFjdGl2aXR5X3RpbWVvdXQgKiAxMDAwXG4gICAgICAgICAgICB9O1xuICAgICAgICB9XG4gICAgICAgIGVsc2UgaWYgKG1lc3NhZ2UuZXZlbnQgPT09ICdwdXNoZXI6ZXJyb3InKSB7XG4gICAgICAgICAgICByZXR1cm4ge1xuICAgICAgICAgICAgICAgIGFjdGlvbjogdGhpcy5nZXRDbG9zZUFjdGlvbihtZXNzYWdlLmRhdGEpLFxuICAgICAgICAgICAgICAgIGVycm9yOiB0aGlzLmdldENsb3NlRXJyb3IobWVzc2FnZS5kYXRhKVxuICAgICAgICAgICAgfTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHRocm93ICdJbnZhbGlkIGhhbmRzaGFrZSc7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIGdldENsb3NlQWN0aW9uOiBmdW5jdGlvbiAoY2xvc2VFdmVudCkge1xuICAgICAgICBpZiAoY2xvc2VFdmVudC5jb2RlIDwgNDAwMCkge1xuICAgICAgICAgICAgaWYgKGNsb3NlRXZlbnQuY29kZSA+PSAxMDAyICYmIGNsb3NlRXZlbnQuY29kZSA8PSAxMDA0KSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuICdiYWNrb2ZmJztcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIHJldHVybiBudWxsO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICAgIGVsc2UgaWYgKGNsb3NlRXZlbnQuY29kZSA9PT0gNDAwMCkge1xuICAgICAgICAgICAgcmV0dXJuICd0bHNfb25seSc7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAoY2xvc2VFdmVudC5jb2RlIDwgNDEwMCkge1xuICAgICAgICAgICAgcmV0dXJuICdyZWZ1c2VkJztcbiAgICAgICAgfVxuICAgICAgICBlbHNlIGlmIChjbG9zZUV2ZW50LmNvZGUgPCA0MjAwKSB7XG4gICAgICAgICAgICByZXR1cm4gJ2JhY2tvZmYnO1xuICAgICAgICB9XG4gICAgICAgIGVsc2UgaWYgKGNsb3NlRXZlbnQuY29kZSA8IDQzMDApIHtcbiAgICAgICAgICAgIHJldHVybiAncmV0cnknO1xuICAgICAgICB9XG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgcmV0dXJuICdyZWZ1c2VkJztcbiAgICAgICAgfVxuICAgIH0sXG4gICAgZ2V0Q2xvc2VFcnJvcjogZnVuY3Rpb24gKGNsb3NlRXZlbnQpIHtcbiAgICAgICAgaWYgKGNsb3NlRXZlbnQuY29kZSAhPT0gMTAwMCAmJiBjbG9zZUV2ZW50LmNvZGUgIT09IDEwMDEpIHtcbiAgICAgICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICAgICAgdHlwZTogJ1B1c2hlckVycm9yJyxcbiAgICAgICAgICAgICAgICBkYXRhOiB7XG4gICAgICAgICAgICAgICAgICAgIGNvZGU6IGNsb3NlRXZlbnQuY29kZSxcbiAgICAgICAgICAgICAgICAgICAgbWVzc2FnZTogY2xvc2VFdmVudC5yZWFzb24gfHwgY2xvc2VFdmVudC5tZXNzYWdlXG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHJldHVybiBudWxsO1xuICAgICAgICB9XG4gICAgfVxufTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHByb3RvY29sX3Byb3RvY29sID0gKFByb3RvY29sKTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS9jb25uZWN0aW9uL2Nvbm5lY3Rpb24udHNcbnZhciBjb25uZWN0aW9uX2V4dGVuZHMgPSAodW5kZWZpbmVkICYmIHVuZGVmaW5lZC5fX2V4dGVuZHMpIHx8IChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGV4dGVuZFN0YXRpY3MgPSBmdW5jdGlvbiAoZCwgYikge1xuICAgICAgICBleHRlbmRTdGF0aWNzID0gT2JqZWN0LnNldFByb3RvdHlwZU9mIHx8XG4gICAgICAgICAgICAoeyBfX3Byb3RvX186IFtdIH0gaW5zdGFuY2VvZiBBcnJheSAmJiBmdW5jdGlvbiAoZCwgYikgeyBkLl9fcHJvdG9fXyA9IGI7IH0pIHx8XG4gICAgICAgICAgICBmdW5jdGlvbiAoZCwgYikgeyBmb3IgKHZhciBwIGluIGIpIGlmIChiLmhhc093blByb3BlcnR5KHApKSBkW3BdID0gYltwXTsgfTtcbiAgICAgICAgcmV0dXJuIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgfTtcbiAgICByZXR1cm4gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyhkLCBiKTtcbiAgICAgICAgZnVuY3Rpb24gX18oKSB7IHRoaXMuY29uc3RydWN0b3IgPSBkOyB9XG4gICAgICAgIGQucHJvdG90eXBlID0gYiA9PT0gbnVsbCA/IE9iamVjdC5jcmVhdGUoYikgOiAoX18ucHJvdG90eXBlID0gYi5wcm90b3R5cGUsIG5ldyBfXygpKTtcbiAgICB9O1xufSkoKTtcblxuXG5cblxudmFyIGNvbm5lY3Rpb25fQ29ubmVjdGlvbiA9IChmdW5jdGlvbiAoX3N1cGVyKSB7XG4gICAgY29ubmVjdGlvbl9leHRlbmRzKENvbm5lY3Rpb24sIF9zdXBlcik7XG4gICAgZnVuY3Rpb24gQ29ubmVjdGlvbihpZCwgdHJhbnNwb3J0KSB7XG4gICAgICAgIHZhciBfdGhpcyA9IF9zdXBlci5jYWxsKHRoaXMpIHx8IHRoaXM7XG4gICAgICAgIF90aGlzLmlkID0gaWQ7XG4gICAgICAgIF90aGlzLnRyYW5zcG9ydCA9IHRyYW5zcG9ydDtcbiAgICAgICAgX3RoaXMuYWN0aXZpdHlUaW1lb3V0ID0gdHJhbnNwb3J0LmFjdGl2aXR5VGltZW91dDtcbiAgICAgICAgX3RoaXMuYmluZExpc3RlbmVycygpO1xuICAgICAgICByZXR1cm4gX3RoaXM7XG4gICAgfVxuICAgIENvbm5lY3Rpb24ucHJvdG90eXBlLmhhbmRsZXNBY3Rpdml0eUNoZWNrcyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMudHJhbnNwb3J0LmhhbmRsZXNBY3Rpdml0eUNoZWNrcygpO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbi5wcm90b3R5cGUuc2VuZCA9IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgIHJldHVybiB0aGlzLnRyYW5zcG9ydC5zZW5kKGRhdGEpO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbi5wcm90b3R5cGUuc2VuZF9ldmVudCA9IGZ1bmN0aW9uIChuYW1lLCBkYXRhLCBjaGFubmVsKSB7XG4gICAgICAgIHZhciBldmVudCA9IHsgZXZlbnQ6IG5hbWUsIGRhdGE6IGRhdGEgfTtcbiAgICAgICAgaWYgKGNoYW5uZWwpIHtcbiAgICAgICAgICAgIGV2ZW50LmNoYW5uZWwgPSBjaGFubmVsO1xuICAgICAgICB9XG4gICAgICAgIGxvZ2dlci5kZWJ1ZygnRXZlbnQgc2VudCcsIGV2ZW50KTtcbiAgICAgICAgcmV0dXJuIHRoaXMuc2VuZChwcm90b2NvbF9wcm90b2NvbC5lbmNvZGVNZXNzYWdlKGV2ZW50KSk7XG4gICAgfTtcbiAgICBDb25uZWN0aW9uLnByb3RvdHlwZS5waW5nID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBpZiAodGhpcy50cmFuc3BvcnQuc3VwcG9ydHNQaW5nKCkpIHtcbiAgICAgICAgICAgIHRoaXMudHJhbnNwb3J0LnBpbmcoKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHRoaXMuc2VuZF9ldmVudCgncHVzaGVyOnBpbmcnLCB7fSk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIENvbm5lY3Rpb24ucHJvdG90eXBlLmNsb3NlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB0aGlzLnRyYW5zcG9ydC5jbG9zZSgpO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbi5wcm90b3R5cGUuYmluZExpc3RlbmVycyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIF90aGlzID0gdGhpcztcbiAgICAgICAgdmFyIGxpc3RlbmVycyA9IHtcbiAgICAgICAgICAgIG1lc3NhZ2U6IGZ1bmN0aW9uIChtZXNzYWdlRXZlbnQpIHtcbiAgICAgICAgICAgICAgICB2YXIgcHVzaGVyRXZlbnQ7XG4gICAgICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgICAgICAgcHVzaGVyRXZlbnQgPSBwcm90b2NvbF9wcm90b2NvbC5kZWNvZGVNZXNzYWdlKG1lc3NhZ2VFdmVudCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGNhdGNoIChlKSB7XG4gICAgICAgICAgICAgICAgICAgIF90aGlzLmVtaXQoJ2Vycm9yJywge1xuICAgICAgICAgICAgICAgICAgICAgICAgdHlwZTogJ01lc3NhZ2VQYXJzZUVycm9yJyxcbiAgICAgICAgICAgICAgICAgICAgICAgIGVycm9yOiBlLFxuICAgICAgICAgICAgICAgICAgICAgICAgZGF0YTogbWVzc2FnZUV2ZW50LmRhdGFcbiAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGlmIChwdXNoZXJFdmVudCAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAgICAgICAgICAgICAgIGxvZ2dlci5kZWJ1ZygnRXZlbnQgcmVjZCcsIHB1c2hlckV2ZW50KTtcbiAgICAgICAgICAgICAgICAgICAgc3dpdGNoIChwdXNoZXJFdmVudC5ldmVudCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAncHVzaGVyOmVycm9yJzpcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBfdGhpcy5lbWl0KCdlcnJvcicsIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdHlwZTogJ1B1c2hlckVycm9yJyxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZGF0YTogcHVzaGVyRXZlbnQuZGF0YVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAncHVzaGVyOnBpbmcnOlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIF90aGlzLmVtaXQoJ3BpbmcnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcbiAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ3B1c2hlcjpwb25nJzpcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBfdGhpcy5lbWl0KCdwb25nJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgX3RoaXMuZW1pdCgnbWVzc2FnZScsIHB1c2hlckV2ZW50KTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgYWN0aXZpdHk6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5lbWl0KCdhY3Rpdml0eScpO1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZXJyb3IpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5lbWl0KCdlcnJvcicsIGVycm9yKTtcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBjbG9zZWQ6IGZ1bmN0aW9uIChjbG9zZUV2ZW50KSB7XG4gICAgICAgICAgICAgICAgdW5iaW5kTGlzdGVuZXJzKCk7XG4gICAgICAgICAgICAgICAgaWYgKGNsb3NlRXZlbnQgJiYgY2xvc2VFdmVudC5jb2RlKSB7XG4gICAgICAgICAgICAgICAgICAgIF90aGlzLmhhbmRsZUNsb3NlRXZlbnQoY2xvc2VFdmVudCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIF90aGlzLnRyYW5zcG9ydCA9IG51bGw7XG4gICAgICAgICAgICAgICAgX3RoaXMuZW1pdCgnY2xvc2VkJyk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH07XG4gICAgICAgIHZhciB1bmJpbmRMaXN0ZW5lcnMgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBvYmplY3RBcHBseShsaXN0ZW5lcnMsIGZ1bmN0aW9uIChsaXN0ZW5lciwgZXZlbnQpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy50cmFuc3BvcnQudW5iaW5kKGV2ZW50LCBsaXN0ZW5lcik7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfTtcbiAgICAgICAgb2JqZWN0QXBwbHkobGlzdGVuZXJzLCBmdW5jdGlvbiAobGlzdGVuZXIsIGV2ZW50KSB7XG4gICAgICAgICAgICBfdGhpcy50cmFuc3BvcnQuYmluZChldmVudCwgbGlzdGVuZXIpO1xuICAgICAgICB9KTtcbiAgICB9O1xuICAgIENvbm5lY3Rpb24ucHJvdG90eXBlLmhhbmRsZUNsb3NlRXZlbnQgPSBmdW5jdGlvbiAoY2xvc2VFdmVudCkge1xuICAgICAgICB2YXIgYWN0aW9uID0gcHJvdG9jb2xfcHJvdG9jb2wuZ2V0Q2xvc2VBY3Rpb24oY2xvc2VFdmVudCk7XG4gICAgICAgIHZhciBlcnJvciA9IHByb3RvY29sX3Byb3RvY29sLmdldENsb3NlRXJyb3IoY2xvc2VFdmVudCk7XG4gICAgICAgIGlmIChlcnJvcikge1xuICAgICAgICAgICAgdGhpcy5lbWl0KCdlcnJvcicsIGVycm9yKTtcbiAgICAgICAgfVxuICAgICAgICBpZiAoYWN0aW9uKSB7XG4gICAgICAgICAgICB0aGlzLmVtaXQoYWN0aW9uLCB7IGFjdGlvbjogYWN0aW9uLCBlcnJvcjogZXJyb3IgfSk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIHJldHVybiBDb25uZWN0aW9uO1xufShkaXNwYXRjaGVyKSk7XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciBjb25uZWN0aW9uX2Nvbm5lY3Rpb24gPSAoY29ubmVjdGlvbl9Db25uZWN0aW9uKTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS9jb25uZWN0aW9uL2hhbmRzaGFrZS9pbmRleC50c1xuXG5cblxudmFyIGhhbmRzaGFrZV9IYW5kc2hha2UgPSAoZnVuY3Rpb24gKCkge1xuICAgIGZ1bmN0aW9uIEhhbmRzaGFrZSh0cmFuc3BvcnQsIGNhbGxiYWNrKSB7XG4gICAgICAgIHRoaXMudHJhbnNwb3J0ID0gdHJhbnNwb3J0O1xuICAgICAgICB0aGlzLmNhbGxiYWNrID0gY2FsbGJhY2s7XG4gICAgICAgIHRoaXMuYmluZExpc3RlbmVycygpO1xuICAgIH1cbiAgICBIYW5kc2hha2UucHJvdG90eXBlLmNsb3NlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB0aGlzLnVuYmluZExpc3RlbmVycygpO1xuICAgICAgICB0aGlzLnRyYW5zcG9ydC5jbG9zZSgpO1xuICAgIH07XG4gICAgSGFuZHNoYWtlLnByb3RvdHlwZS5iaW5kTGlzdGVuZXJzID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICB0aGlzLm9uTWVzc2FnZSA9IGZ1bmN0aW9uIChtKSB7XG4gICAgICAgICAgICBfdGhpcy51bmJpbmRMaXN0ZW5lcnMoKTtcbiAgICAgICAgICAgIHZhciByZXN1bHQ7XG4gICAgICAgICAgICB0cnkge1xuICAgICAgICAgICAgICAgIHJlc3VsdCA9IHByb3RvY29sX3Byb3RvY29sLnByb2Nlc3NIYW5kc2hha2UobSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBjYXRjaCAoZSkge1xuICAgICAgICAgICAgICAgIF90aGlzLmZpbmlzaCgnZXJyb3InLCB7IGVycm9yOiBlIH0pO1xuICAgICAgICAgICAgICAgIF90aGlzLnRyYW5zcG9ydC5jbG9zZSgpO1xuICAgICAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmIChyZXN1bHQuYWN0aW9uID09PSAnY29ubmVjdGVkJykge1xuICAgICAgICAgICAgICAgIF90aGlzLmZpbmlzaCgnY29ubmVjdGVkJywge1xuICAgICAgICAgICAgICAgICAgICBjb25uZWN0aW9uOiBuZXcgY29ubmVjdGlvbl9jb25uZWN0aW9uKHJlc3VsdC5pZCwgX3RoaXMudHJhbnNwb3J0KSxcbiAgICAgICAgICAgICAgICAgICAgYWN0aXZpdHlUaW1lb3V0OiByZXN1bHQuYWN0aXZpdHlUaW1lb3V0XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5maW5pc2gocmVzdWx0LmFjdGlvbiwgeyBlcnJvcjogcmVzdWx0LmVycm9yIH0pO1xuICAgICAgICAgICAgICAgIF90aGlzLnRyYW5zcG9ydC5jbG9zZSgpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9O1xuICAgICAgICB0aGlzLm9uQ2xvc2VkID0gZnVuY3Rpb24gKGNsb3NlRXZlbnQpIHtcbiAgICAgICAgICAgIF90aGlzLnVuYmluZExpc3RlbmVycygpO1xuICAgICAgICAgICAgdmFyIGFjdGlvbiA9IHByb3RvY29sX3Byb3RvY29sLmdldENsb3NlQWN0aW9uKGNsb3NlRXZlbnQpIHx8ICdiYWNrb2ZmJztcbiAgICAgICAgICAgIHZhciBlcnJvciA9IHByb3RvY29sX3Byb3RvY29sLmdldENsb3NlRXJyb3IoY2xvc2VFdmVudCk7XG4gICAgICAgICAgICBfdGhpcy5maW5pc2goYWN0aW9uLCB7IGVycm9yOiBlcnJvciB9KTtcbiAgICAgICAgfTtcbiAgICAgICAgdGhpcy50cmFuc3BvcnQuYmluZCgnbWVzc2FnZScsIHRoaXMub25NZXNzYWdlKTtcbiAgICAgICAgdGhpcy50cmFuc3BvcnQuYmluZCgnY2xvc2VkJywgdGhpcy5vbkNsb3NlZCk7XG4gICAgfTtcbiAgICBIYW5kc2hha2UucHJvdG90eXBlLnVuYmluZExpc3RlbmVycyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy50cmFuc3BvcnQudW5iaW5kKCdtZXNzYWdlJywgdGhpcy5vbk1lc3NhZ2UpO1xuICAgICAgICB0aGlzLnRyYW5zcG9ydC51bmJpbmQoJ2Nsb3NlZCcsIHRoaXMub25DbG9zZWQpO1xuICAgIH07XG4gICAgSGFuZHNoYWtlLnByb3RvdHlwZS5maW5pc2ggPSBmdW5jdGlvbiAoYWN0aW9uLCBwYXJhbXMpIHtcbiAgICAgICAgdGhpcy5jYWxsYmFjayhleHRlbmQoeyB0cmFuc3BvcnQ6IHRoaXMudHJhbnNwb3J0LCBhY3Rpb246IGFjdGlvbiB9LCBwYXJhbXMpKTtcbiAgICB9O1xuICAgIHJldHVybiBIYW5kc2hha2U7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgY29ubmVjdGlvbl9oYW5kc2hha2UgPSAoaGFuZHNoYWtlX0hhbmRzaGFrZSk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvYXV0aC9wdXNoZXJfYXV0aG9yaXplci50c1xuXG52YXIgcHVzaGVyX2F1dGhvcml6ZXJfUHVzaGVyQXV0aG9yaXplciA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gUHVzaGVyQXV0aG9yaXplcihjaGFubmVsLCBvcHRpb25zKSB7XG4gICAgICAgIHRoaXMuY2hhbm5lbCA9IGNoYW5uZWw7XG4gICAgICAgIHZhciBhdXRoVHJhbnNwb3J0ID0gb3B0aW9ucy5hdXRoVHJhbnNwb3J0O1xuICAgICAgICBpZiAodHlwZW9mIHJ1bnRpbWUuZ2V0QXV0aG9yaXplcnMoKVthdXRoVHJhbnNwb3J0XSA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgICAgIHRocm93IFwiJ1wiICsgYXV0aFRyYW5zcG9ydCArIFwiJyBpcyBub3QgYSByZWNvZ25pemVkIGF1dGggdHJhbnNwb3J0XCI7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy50eXBlID0gYXV0aFRyYW5zcG9ydDtcbiAgICAgICAgdGhpcy5vcHRpb25zID0gb3B0aW9ucztcbiAgICAgICAgdGhpcy5hdXRoT3B0aW9ucyA9IG9wdGlvbnMuYXV0aCB8fCB7fTtcbiAgICB9XG4gICAgUHVzaGVyQXV0aG9yaXplci5wcm90b3R5cGUuY29tcG9zZVF1ZXJ5ID0gZnVuY3Rpb24gKHNvY2tldElkKSB7XG4gICAgICAgIHZhciBxdWVyeSA9ICdzb2NrZXRfaWQ9JyArXG4gICAgICAgICAgICBlbmNvZGVVUklDb21wb25lbnQoc29ja2V0SWQpICtcbiAgICAgICAgICAgICcmY2hhbm5lbF9uYW1lPScgK1xuICAgICAgICAgICAgZW5jb2RlVVJJQ29tcG9uZW50KHRoaXMuY2hhbm5lbC5uYW1lKTtcbiAgICAgICAgZm9yICh2YXIgaSBpbiB0aGlzLmF1dGhPcHRpb25zLnBhcmFtcykge1xuICAgICAgICAgICAgcXVlcnkgKz1cbiAgICAgICAgICAgICAgICAnJicgK1xuICAgICAgICAgICAgICAgICAgICBlbmNvZGVVUklDb21wb25lbnQoaSkgK1xuICAgICAgICAgICAgICAgICAgICAnPScgK1xuICAgICAgICAgICAgICAgICAgICBlbmNvZGVVUklDb21wb25lbnQodGhpcy5hdXRoT3B0aW9ucy5wYXJhbXNbaV0pO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiBxdWVyeTtcbiAgICB9O1xuICAgIFB1c2hlckF1dGhvcml6ZXIucHJvdG90eXBlLmF1dGhvcml6ZSA9IGZ1bmN0aW9uIChzb2NrZXRJZCwgY2FsbGJhY2spIHtcbiAgICAgICAgUHVzaGVyQXV0aG9yaXplci5hdXRob3JpemVycyA9XG4gICAgICAgICAgICBQdXNoZXJBdXRob3JpemVyLmF1dGhvcml6ZXJzIHx8IHJ1bnRpbWUuZ2V0QXV0aG9yaXplcnMoKTtcbiAgICAgICAgUHVzaGVyQXV0aG9yaXplci5hdXRob3JpemVyc1t0aGlzLnR5cGVdLmNhbGwodGhpcywgcnVudGltZSwgc29ja2V0SWQsIGNhbGxiYWNrKTtcbiAgICB9O1xuICAgIHJldHVybiBQdXNoZXJBdXRob3JpemVyO1xufSgpKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHB1c2hlcl9hdXRob3JpemVyID0gKHB1c2hlcl9hdXRob3JpemVyX1B1c2hlckF1dGhvcml6ZXIpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3RpbWVsaW5lL3RpbWVsaW5lX3NlbmRlci50c1xuXG52YXIgdGltZWxpbmVfc2VuZGVyX1RpbWVsaW5lU2VuZGVyID0gKGZ1bmN0aW9uICgpIHtcbiAgICBmdW5jdGlvbiBUaW1lbGluZVNlbmRlcih0aW1lbGluZSwgb3B0aW9ucykge1xuICAgICAgICB0aGlzLnRpbWVsaW5lID0gdGltZWxpbmU7XG4gICAgICAgIHRoaXMub3B0aW9ucyA9IG9wdGlvbnMgfHwge307XG4gICAgfVxuICAgIFRpbWVsaW5lU2VuZGVyLnByb3RvdHlwZS5zZW5kID0gZnVuY3Rpb24gKHVzZVRMUywgY2FsbGJhY2spIHtcbiAgICAgICAgaWYgKHRoaXMudGltZWxpbmUuaXNFbXB0eSgpKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy50aW1lbGluZS5zZW5kKHJ1bnRpbWUuVGltZWxpbmVUcmFuc3BvcnQuZ2V0QWdlbnQodGhpcywgdXNlVExTKSwgY2FsbGJhY2spO1xuICAgIH07XG4gICAgcmV0dXJuIFRpbWVsaW5lU2VuZGVyO1xufSgpKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHRpbWVsaW5lX3NlbmRlciA9ICh0aW1lbGluZV9zZW5kZXJfVGltZWxpbmVTZW5kZXIpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL2NoYW5uZWxzL2NoYW5uZWwudHNcbnZhciBjaGFubmVsX2V4dGVuZHMgPSAodW5kZWZpbmVkICYmIHVuZGVmaW5lZC5fX2V4dGVuZHMpIHx8IChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGV4dGVuZFN0YXRpY3MgPSBmdW5jdGlvbiAoZCwgYikge1xuICAgICAgICBleHRlbmRTdGF0aWNzID0gT2JqZWN0LnNldFByb3RvdHlwZU9mIHx8XG4gICAgICAgICAgICAoeyBfX3Byb3RvX186IFtdIH0gaW5zdGFuY2VvZiBBcnJheSAmJiBmdW5jdGlvbiAoZCwgYikgeyBkLl9fcHJvdG9fXyA9IGI7IH0pIHx8XG4gICAgICAgICAgICBmdW5jdGlvbiAoZCwgYikgeyBmb3IgKHZhciBwIGluIGIpIGlmIChiLmhhc093blByb3BlcnR5KHApKSBkW3BdID0gYltwXTsgfTtcbiAgICAgICAgcmV0dXJuIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgfTtcbiAgICByZXR1cm4gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyhkLCBiKTtcbiAgICAgICAgZnVuY3Rpb24gX18oKSB7IHRoaXMuY29uc3RydWN0b3IgPSBkOyB9XG4gICAgICAgIGQucHJvdG90eXBlID0gYiA9PT0gbnVsbCA/IE9iamVjdC5jcmVhdGUoYikgOiAoX18ucHJvdG90eXBlID0gYi5wcm90b3R5cGUsIG5ldyBfXygpKTtcbiAgICB9O1xufSkoKTtcblxuXG5cblxuXG52YXIgY2hhbm5lbF9DaGFubmVsID0gKGZ1bmN0aW9uIChfc3VwZXIpIHtcbiAgICBjaGFubmVsX2V4dGVuZHMoQ2hhbm5lbCwgX3N1cGVyKTtcbiAgICBmdW5jdGlvbiBDaGFubmVsKG5hbWUsIHB1c2hlcikge1xuICAgICAgICB2YXIgX3RoaXMgPSBfc3VwZXIuY2FsbCh0aGlzLCBmdW5jdGlvbiAoZXZlbnQsIGRhdGEpIHtcbiAgICAgICAgICAgIGxvZ2dlci5kZWJ1ZygnTm8gY2FsbGJhY2tzIG9uICcgKyBuYW1lICsgJyBmb3IgJyArIGV2ZW50KTtcbiAgICAgICAgfSkgfHwgdGhpcztcbiAgICAgICAgX3RoaXMubmFtZSA9IG5hbWU7XG4gICAgICAgIF90aGlzLnB1c2hlciA9IHB1c2hlcjtcbiAgICAgICAgX3RoaXMuc3Vic2NyaWJlZCA9IGZhbHNlO1xuICAgICAgICBfdGhpcy5zdWJzY3JpcHRpb25QZW5kaW5nID0gZmFsc2U7XG4gICAgICAgIF90aGlzLnN1YnNjcmlwdGlvbkNhbmNlbGxlZCA9IGZhbHNlO1xuICAgICAgICByZXR1cm4gX3RoaXM7XG4gICAgfVxuICAgIENoYW5uZWwucHJvdG90eXBlLmF1dGhvcml6ZSA9IGZ1bmN0aW9uIChzb2NrZXRJZCwgY2FsbGJhY2spIHtcbiAgICAgICAgcmV0dXJuIGNhbGxiYWNrKG51bGwsIHsgYXV0aDogJycgfSk7XG4gICAgfTtcbiAgICBDaGFubmVsLnByb3RvdHlwZS50cmlnZ2VyID0gZnVuY3Rpb24gKGV2ZW50LCBkYXRhKSB7XG4gICAgICAgIGlmIChldmVudC5pbmRleE9mKCdjbGllbnQtJykgIT09IDApIHtcbiAgICAgICAgICAgIHRocm93IG5ldyBCYWRFdmVudE5hbWUoXCJFdmVudCAnXCIgKyBldmVudCArIFwiJyBkb2VzIG5vdCBzdGFydCB3aXRoICdjbGllbnQtJ1wiKTtcbiAgICAgICAgfVxuICAgICAgICBpZiAoIXRoaXMuc3Vic2NyaWJlZCkge1xuICAgICAgICAgICAgdmFyIHN1ZmZpeCA9IHVybF9zdG9yZS5idWlsZExvZ1N1ZmZpeCgndHJpZ2dlcmluZ0NsaWVudEV2ZW50cycpO1xuICAgICAgICAgICAgbG9nZ2VyLndhcm4oXCJDbGllbnQgZXZlbnQgdHJpZ2dlcmVkIGJlZm9yZSBjaGFubmVsICdzdWJzY3JpcHRpb25fc3VjY2VlZGVkJyBldmVudCAuIFwiICsgc3VmZml4KTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gdGhpcy5wdXNoZXIuc2VuZF9ldmVudChldmVudCwgZGF0YSwgdGhpcy5uYW1lKTtcbiAgICB9O1xuICAgIENoYW5uZWwucHJvdG90eXBlLmRpc2Nvbm5lY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMuc3Vic2NyaWJlZCA9IGZhbHNlO1xuICAgICAgICB0aGlzLnN1YnNjcmlwdGlvblBlbmRpbmcgPSBmYWxzZTtcbiAgICB9O1xuICAgIENoYW5uZWwucHJvdG90eXBlLmhhbmRsZUV2ZW50ID0gZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIHZhciBldmVudE5hbWUgPSBldmVudC5ldmVudDtcbiAgICAgICAgdmFyIGRhdGEgPSBldmVudC5kYXRhO1xuICAgICAgICBpZiAoZXZlbnROYW1lID09PSAncHVzaGVyX2ludGVybmFsOnN1YnNjcmlwdGlvbl9zdWNjZWVkZWQnKSB7XG4gICAgICAgICAgICB0aGlzLmhhbmRsZVN1YnNjcmlwdGlvblN1Y2NlZWRlZEV2ZW50KGV2ZW50KTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIGlmIChldmVudE5hbWUuaW5kZXhPZigncHVzaGVyX2ludGVybmFsOicpICE9PSAwKSB7XG4gICAgICAgICAgICB2YXIgbWV0YWRhdGEgPSB7fTtcbiAgICAgICAgICAgIHRoaXMuZW1pdChldmVudE5hbWUsIGRhdGEsIG1ldGFkYXRhKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgQ2hhbm5lbC5wcm90b3R5cGUuaGFuZGxlU3Vic2NyaXB0aW9uU3VjY2VlZGVkRXZlbnQgPSBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgdGhpcy5zdWJzY3JpcHRpb25QZW5kaW5nID0gZmFsc2U7XG4gICAgICAgIHRoaXMuc3Vic2NyaWJlZCA9IHRydWU7XG4gICAgICAgIGlmICh0aGlzLnN1YnNjcmlwdGlvbkNhbmNlbGxlZCkge1xuICAgICAgICAgICAgdGhpcy5wdXNoZXIudW5zdWJzY3JpYmUodGhpcy5uYW1lKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHRoaXMuZW1pdCgncHVzaGVyOnN1YnNjcmlwdGlvbl9zdWNjZWVkZWQnLCBldmVudC5kYXRhKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgQ2hhbm5lbC5wcm90b3R5cGUuc3Vic2NyaWJlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICBpZiAodGhpcy5zdWJzY3JpYmVkKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy5zdWJzY3JpcHRpb25QZW5kaW5nID0gdHJ1ZTtcbiAgICAgICAgdGhpcy5zdWJzY3JpcHRpb25DYW5jZWxsZWQgPSBmYWxzZTtcbiAgICAgICAgdGhpcy5hdXRob3JpemUodGhpcy5wdXNoZXIuY29ubmVjdGlvbi5zb2NrZXRfaWQsIGZ1bmN0aW9uIChlcnJvciwgZGF0YSkge1xuICAgICAgICAgICAgaWYgKGVycm9yKSB7XG4gICAgICAgICAgICAgICAgX3RoaXMuc3Vic2NyaXB0aW9uUGVuZGluZyA9IGZhbHNlO1xuICAgICAgICAgICAgICAgIGxvZ2dlci5lcnJvcihlcnJvci50b1N0cmluZygpKTtcbiAgICAgICAgICAgICAgICBfdGhpcy5lbWl0KCdwdXNoZXI6c3Vic2NyaXB0aW9uX2Vycm9yJywgT2JqZWN0LmFzc2lnbih7fSwge1xuICAgICAgICAgICAgICAgICAgICB0eXBlOiAnQXV0aEVycm9yJyxcbiAgICAgICAgICAgICAgICAgICAgZXJyb3I6IGVycm9yLm1lc3NhZ2VcbiAgICAgICAgICAgICAgICB9LCBlcnJvciBpbnN0YW5jZW9mIEhUVFBBdXRoRXJyb3IgPyB7IHN0YXR1czogZXJyb3Iuc3RhdHVzIH0gOiB7fSkpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgX3RoaXMucHVzaGVyLnNlbmRfZXZlbnQoJ3B1c2hlcjpzdWJzY3JpYmUnLCB7XG4gICAgICAgICAgICAgICAgICAgIGF1dGg6IGRhdGEuYXV0aCxcbiAgICAgICAgICAgICAgICAgICAgY2hhbm5lbF9kYXRhOiBkYXRhLmNoYW5uZWxfZGF0YSxcbiAgICAgICAgICAgICAgICAgICAgY2hhbm5lbDogX3RoaXMubmFtZVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9O1xuICAgIENoYW5uZWwucHJvdG90eXBlLnVuc3Vic2NyaWJlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB0aGlzLnN1YnNjcmliZWQgPSBmYWxzZTtcbiAgICAgICAgdGhpcy5wdXNoZXIuc2VuZF9ldmVudCgncHVzaGVyOnVuc3Vic2NyaWJlJywge1xuICAgICAgICAgICAgY2hhbm5lbDogdGhpcy5uYW1lXG4gICAgICAgIH0pO1xuICAgIH07XG4gICAgQ2hhbm5lbC5wcm90b3R5cGUuY2FuY2VsU3Vic2NyaXB0aW9uID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB0aGlzLnN1YnNjcmlwdGlvbkNhbmNlbGxlZCA9IHRydWU7XG4gICAgfTtcbiAgICBDaGFubmVsLnByb3RvdHlwZS5yZWluc3RhdGVTdWJzY3JpcHRpb24gPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMuc3Vic2NyaXB0aW9uQ2FuY2VsbGVkID0gZmFsc2U7XG4gICAgfTtcbiAgICByZXR1cm4gQ2hhbm5lbDtcbn0oZGlzcGF0Y2hlcikpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgY2hhbm5lbHNfY2hhbm5lbCA9IChjaGFubmVsX0NoYW5uZWwpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL2NoYW5uZWxzL3ByaXZhdGVfY2hhbm5lbC50c1xudmFyIHByaXZhdGVfY2hhbm5lbF9leHRlbmRzID0gKHVuZGVmaW5lZCAmJiB1bmRlZmluZWQuX19leHRlbmRzKSB8fCAoZnVuY3Rpb24gKCkge1xuICAgIHZhciBleHRlbmRTdGF0aWNzID0gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiB8fFxuICAgICAgICAgICAgKHsgX19wcm90b19fOiBbXSB9IGluc3RhbmNlb2YgQXJyYXkgJiYgZnVuY3Rpb24gKGQsIGIpIHsgZC5fX3Byb3RvX18gPSBiOyB9KSB8fFxuICAgICAgICAgICAgZnVuY3Rpb24gKGQsIGIpIHsgZm9yICh2YXIgcCBpbiBiKSBpZiAoYi5oYXNPd25Qcm9wZXJ0eShwKSkgZFtwXSA9IGJbcF07IH07XG4gICAgICAgIHJldHVybiBleHRlbmRTdGF0aWNzKGQsIGIpO1xuICAgIH07XG4gICAgcmV0dXJuIGZ1bmN0aW9uIChkLCBiKSB7XG4gICAgICAgIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgICAgIGZ1bmN0aW9uIF9fKCkgeyB0aGlzLmNvbnN0cnVjdG9yID0gZDsgfVxuICAgICAgICBkLnByb3RvdHlwZSA9IGIgPT09IG51bGwgPyBPYmplY3QuY3JlYXRlKGIpIDogKF9fLnByb3RvdHlwZSA9IGIucHJvdG90eXBlLCBuZXcgX18oKSk7XG4gICAgfTtcbn0pKCk7XG5cblxudmFyIHByaXZhdGVfY2hhbm5lbF9Qcml2YXRlQ2hhbm5lbCA9IChmdW5jdGlvbiAoX3N1cGVyKSB7XG4gICAgcHJpdmF0ZV9jaGFubmVsX2V4dGVuZHMoUHJpdmF0ZUNoYW5uZWwsIF9zdXBlcik7XG4gICAgZnVuY3Rpb24gUHJpdmF0ZUNoYW5uZWwoKSB7XG4gICAgICAgIHJldHVybiBfc3VwZXIgIT09IG51bGwgJiYgX3N1cGVyLmFwcGx5KHRoaXMsIGFyZ3VtZW50cykgfHwgdGhpcztcbiAgICB9XG4gICAgUHJpdmF0ZUNoYW5uZWwucHJvdG90eXBlLmF1dGhvcml6ZSA9IGZ1bmN0aW9uIChzb2NrZXRJZCwgY2FsbGJhY2spIHtcbiAgICAgICAgdmFyIGF1dGhvcml6ZXIgPSBmYWN0b3J5LmNyZWF0ZUF1dGhvcml6ZXIodGhpcywgdGhpcy5wdXNoZXIuY29uZmlnKTtcbiAgICAgICAgcmV0dXJuIGF1dGhvcml6ZXIuYXV0aG9yaXplKHNvY2tldElkLCBjYWxsYmFjayk7XG4gICAgfTtcbiAgICByZXR1cm4gUHJpdmF0ZUNoYW5uZWw7XG59KGNoYW5uZWxzX2NoYW5uZWwpKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHByaXZhdGVfY2hhbm5lbCA9IChwcml2YXRlX2NoYW5uZWxfUHJpdmF0ZUNoYW5uZWwpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL2NoYW5uZWxzL21lbWJlcnMudHNcblxudmFyIG1lbWJlcnNfTWVtYmVycyA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gTWVtYmVycygpIHtcbiAgICAgICAgdGhpcy5yZXNldCgpO1xuICAgIH1cbiAgICBNZW1iZXJzLnByb3RvdHlwZS5nZXQgPSBmdW5jdGlvbiAoaWQpIHtcbiAgICAgICAgaWYgKE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbCh0aGlzLm1lbWJlcnMsIGlkKSkge1xuICAgICAgICAgICAgcmV0dXJuIHtcbiAgICAgICAgICAgICAgICBpZDogaWQsXG4gICAgICAgICAgICAgICAgaW5mbzogdGhpcy5tZW1iZXJzW2lkXVxuICAgICAgICAgICAgfTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHJldHVybiBudWxsO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBNZW1iZXJzLnByb3RvdHlwZS5lYWNoID0gZnVuY3Rpb24gKGNhbGxiYWNrKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIG9iamVjdEFwcGx5KHRoaXMubWVtYmVycywgZnVuY3Rpb24gKG1lbWJlciwgaWQpIHtcbiAgICAgICAgICAgIGNhbGxiYWNrKF90aGlzLmdldChpZCkpO1xuICAgICAgICB9KTtcbiAgICB9O1xuICAgIE1lbWJlcnMucHJvdG90eXBlLnNldE15SUQgPSBmdW5jdGlvbiAoaWQpIHtcbiAgICAgICAgdGhpcy5teUlEID0gaWQ7XG4gICAgfTtcbiAgICBNZW1iZXJzLnByb3RvdHlwZS5vblN1YnNjcmlwdGlvbiA9IGZ1bmN0aW9uIChzdWJzY3JpcHRpb25EYXRhKSB7XG4gICAgICAgIHRoaXMubWVtYmVycyA9IHN1YnNjcmlwdGlvbkRhdGEucHJlc2VuY2UuaGFzaDtcbiAgICAgICAgdGhpcy5jb3VudCA9IHN1YnNjcmlwdGlvbkRhdGEucHJlc2VuY2UuY291bnQ7XG4gICAgICAgIHRoaXMubWUgPSB0aGlzLmdldCh0aGlzLm15SUQpO1xuICAgIH07XG4gICAgTWVtYmVycy5wcm90b3R5cGUuYWRkTWVtYmVyID0gZnVuY3Rpb24gKG1lbWJlckRhdGEpIHtcbiAgICAgICAgaWYgKHRoaXMuZ2V0KG1lbWJlckRhdGEudXNlcl9pZCkgPT09IG51bGwpIHtcbiAgICAgICAgICAgIHRoaXMuY291bnQrKztcbiAgICAgICAgfVxuICAgICAgICB0aGlzLm1lbWJlcnNbbWVtYmVyRGF0YS51c2VyX2lkXSA9IG1lbWJlckRhdGEudXNlcl9pbmZvO1xuICAgICAgICByZXR1cm4gdGhpcy5nZXQobWVtYmVyRGF0YS51c2VyX2lkKTtcbiAgICB9O1xuICAgIE1lbWJlcnMucHJvdG90eXBlLnJlbW92ZU1lbWJlciA9IGZ1bmN0aW9uIChtZW1iZXJEYXRhKSB7XG4gICAgICAgIHZhciBtZW1iZXIgPSB0aGlzLmdldChtZW1iZXJEYXRhLnVzZXJfaWQpO1xuICAgICAgICBpZiAobWVtYmVyKSB7XG4gICAgICAgICAgICBkZWxldGUgdGhpcy5tZW1iZXJzW21lbWJlckRhdGEudXNlcl9pZF07XG4gICAgICAgICAgICB0aGlzLmNvdW50LS07XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIG1lbWJlcjtcbiAgICB9O1xuICAgIE1lbWJlcnMucHJvdG90eXBlLnJlc2V0ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB0aGlzLm1lbWJlcnMgPSB7fTtcbiAgICAgICAgdGhpcy5jb3VudCA9IDA7XG4gICAgICAgIHRoaXMubXlJRCA9IG51bGw7XG4gICAgICAgIHRoaXMubWUgPSBudWxsO1xuICAgIH07XG4gICAgcmV0dXJuIE1lbWJlcnM7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgbWVtYmVycyA9IChtZW1iZXJzX01lbWJlcnMpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL2NoYW5uZWxzL3ByZXNlbmNlX2NoYW5uZWwudHNcbnZhciBwcmVzZW5jZV9jaGFubmVsX2V4dGVuZHMgPSAodW5kZWZpbmVkICYmIHVuZGVmaW5lZC5fX2V4dGVuZHMpIHx8IChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGV4dGVuZFN0YXRpY3MgPSBmdW5jdGlvbiAoZCwgYikge1xuICAgICAgICBleHRlbmRTdGF0aWNzID0gT2JqZWN0LnNldFByb3RvdHlwZU9mIHx8XG4gICAgICAgICAgICAoeyBfX3Byb3RvX186IFtdIH0gaW5zdGFuY2VvZiBBcnJheSAmJiBmdW5jdGlvbiAoZCwgYikgeyBkLl9fcHJvdG9fXyA9IGI7IH0pIHx8XG4gICAgICAgICAgICBmdW5jdGlvbiAoZCwgYikgeyBmb3IgKHZhciBwIGluIGIpIGlmIChiLmhhc093blByb3BlcnR5KHApKSBkW3BdID0gYltwXTsgfTtcbiAgICAgICAgcmV0dXJuIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgfTtcbiAgICByZXR1cm4gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyhkLCBiKTtcbiAgICAgICAgZnVuY3Rpb24gX18oKSB7IHRoaXMuY29uc3RydWN0b3IgPSBkOyB9XG4gICAgICAgIGQucHJvdG90eXBlID0gYiA9PT0gbnVsbCA/IE9iamVjdC5jcmVhdGUoYikgOiAoX18ucHJvdG90eXBlID0gYi5wcm90b3R5cGUsIG5ldyBfXygpKTtcbiAgICB9O1xufSkoKTtcblxuXG5cblxudmFyIHByZXNlbmNlX2NoYW5uZWxfUHJlc2VuY2VDaGFubmVsID0gKGZ1bmN0aW9uIChfc3VwZXIpIHtcbiAgICBwcmVzZW5jZV9jaGFubmVsX2V4dGVuZHMoUHJlc2VuY2VDaGFubmVsLCBfc3VwZXIpO1xuICAgIGZ1bmN0aW9uIFByZXNlbmNlQ2hhbm5lbChuYW1lLCBwdXNoZXIpIHtcbiAgICAgICAgdmFyIF90aGlzID0gX3N1cGVyLmNhbGwodGhpcywgbmFtZSwgcHVzaGVyKSB8fCB0aGlzO1xuICAgICAgICBfdGhpcy5tZW1iZXJzID0gbmV3IG1lbWJlcnMoKTtcbiAgICAgICAgcmV0dXJuIF90aGlzO1xuICAgIH1cbiAgICBQcmVzZW5jZUNoYW5uZWwucHJvdG90eXBlLmF1dGhvcml6ZSA9IGZ1bmN0aW9uIChzb2NrZXRJZCwgY2FsbGJhY2spIHtcbiAgICAgICAgdmFyIF90aGlzID0gdGhpcztcbiAgICAgICAgX3N1cGVyLnByb3RvdHlwZS5hdXRob3JpemUuY2FsbCh0aGlzLCBzb2NrZXRJZCwgZnVuY3Rpb24gKGVycm9yLCBhdXRoRGF0YSkge1xuICAgICAgICAgICAgaWYgKCFlcnJvcikge1xuICAgICAgICAgICAgICAgIGF1dGhEYXRhID0gYXV0aERhdGE7XG4gICAgICAgICAgICAgICAgaWYgKGF1dGhEYXRhLmNoYW5uZWxfZGF0YSA9PT0gdW5kZWZpbmVkKSB7XG4gICAgICAgICAgICAgICAgICAgIHZhciBzdWZmaXggPSB1cmxfc3RvcmUuYnVpbGRMb2dTdWZmaXgoJ2F1dGhlbnRpY2F0aW9uRW5kcG9pbnQnKTtcbiAgICAgICAgICAgICAgICAgICAgbG9nZ2VyLmVycm9yKFwiSW52YWxpZCBhdXRoIHJlc3BvbnNlIGZvciBjaGFubmVsICdcIiArIF90aGlzLm5hbWUgKyBcIicsXCIgK1xuICAgICAgICAgICAgICAgICAgICAgICAgKFwiZXhwZWN0ZWQgJ2NoYW5uZWxfZGF0YScgZmllbGQuIFwiICsgc3VmZml4KSk7XG4gICAgICAgICAgICAgICAgICAgIGNhbGxiYWNrKCdJbnZhbGlkIGF1dGggcmVzcG9uc2UnKTtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB2YXIgY2hhbm5lbERhdGEgPSBKU09OLnBhcnNlKGF1dGhEYXRhLmNoYW5uZWxfZGF0YSk7XG4gICAgICAgICAgICAgICAgX3RoaXMubWVtYmVycy5zZXRNeUlEKGNoYW5uZWxEYXRhLnVzZXJfaWQpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgY2FsbGJhY2soZXJyb3IsIGF1dGhEYXRhKTtcbiAgICAgICAgfSk7XG4gICAgfTtcbiAgICBQcmVzZW5jZUNoYW5uZWwucHJvdG90eXBlLmhhbmRsZUV2ZW50ID0gZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIHZhciBldmVudE5hbWUgPSBldmVudC5ldmVudDtcbiAgICAgICAgaWYgKGV2ZW50TmFtZS5pbmRleE9mKCdwdXNoZXJfaW50ZXJuYWw6JykgPT09IDApIHtcbiAgICAgICAgICAgIHRoaXMuaGFuZGxlSW50ZXJuYWxFdmVudChldmVudCk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICB2YXIgZGF0YSA9IGV2ZW50LmRhdGE7XG4gICAgICAgICAgICB2YXIgbWV0YWRhdGEgPSB7fTtcbiAgICAgICAgICAgIGlmIChldmVudC51c2VyX2lkKSB7XG4gICAgICAgICAgICAgICAgbWV0YWRhdGEudXNlcl9pZCA9IGV2ZW50LnVzZXJfaWQ7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICB0aGlzLmVtaXQoZXZlbnROYW1lLCBkYXRhLCBtZXRhZGF0YSk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIFByZXNlbmNlQ2hhbm5lbC5wcm90b3R5cGUuaGFuZGxlSW50ZXJuYWxFdmVudCA9IGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICB2YXIgZXZlbnROYW1lID0gZXZlbnQuZXZlbnQ7XG4gICAgICAgIHZhciBkYXRhID0gZXZlbnQuZGF0YTtcbiAgICAgICAgc3dpdGNoIChldmVudE5hbWUpIHtcbiAgICAgICAgICAgIGNhc2UgJ3B1c2hlcl9pbnRlcm5hbDpzdWJzY3JpcHRpb25fc3VjY2VlZGVkJzpcbiAgICAgICAgICAgICAgICB0aGlzLmhhbmRsZVN1YnNjcmlwdGlvblN1Y2NlZWRlZEV2ZW50KGV2ZW50KTtcbiAgICAgICAgICAgICAgICBicmVhaztcbiAgICAgICAgICAgIGNhc2UgJ3B1c2hlcl9pbnRlcm5hbDptZW1iZXJfYWRkZWQnOlxuICAgICAgICAgICAgICAgIHZhciBhZGRlZE1lbWJlciA9IHRoaXMubWVtYmVycy5hZGRNZW1iZXIoZGF0YSk7XG4gICAgICAgICAgICAgICAgdGhpcy5lbWl0KCdwdXNoZXI6bWVtYmVyX2FkZGVkJywgYWRkZWRNZW1iZXIpO1xuICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgY2FzZSAncHVzaGVyX2ludGVybmFsOm1lbWJlcl9yZW1vdmVkJzpcbiAgICAgICAgICAgICAgICB2YXIgcmVtb3ZlZE1lbWJlciA9IHRoaXMubWVtYmVycy5yZW1vdmVNZW1iZXIoZGF0YSk7XG4gICAgICAgICAgICAgICAgaWYgKHJlbW92ZWRNZW1iZXIpIHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5lbWl0KCdwdXNoZXI6bWVtYmVyX3JlbW92ZWQnLCByZW1vdmVkTWVtYmVyKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIFByZXNlbmNlQ2hhbm5lbC5wcm90b3R5cGUuaGFuZGxlU3Vic2NyaXB0aW9uU3VjY2VlZGVkRXZlbnQgPSBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgdGhpcy5zdWJzY3JpcHRpb25QZW5kaW5nID0gZmFsc2U7XG4gICAgICAgIHRoaXMuc3Vic2NyaWJlZCA9IHRydWU7XG4gICAgICAgIGlmICh0aGlzLnN1YnNjcmlwdGlvbkNhbmNlbGxlZCkge1xuICAgICAgICAgICAgdGhpcy5wdXNoZXIudW5zdWJzY3JpYmUodGhpcy5uYW1lKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHRoaXMubWVtYmVycy5vblN1YnNjcmlwdGlvbihldmVudC5kYXRhKTtcbiAgICAgICAgICAgIHRoaXMuZW1pdCgncHVzaGVyOnN1YnNjcmlwdGlvbl9zdWNjZWVkZWQnLCB0aGlzLm1lbWJlcnMpO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBQcmVzZW5jZUNoYW5uZWwucHJvdG90eXBlLmRpc2Nvbm5lY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMubWVtYmVycy5yZXNldCgpO1xuICAgICAgICBfc3VwZXIucHJvdG90eXBlLmRpc2Nvbm5lY3QuY2FsbCh0aGlzKTtcbiAgICB9O1xuICAgIHJldHVybiBQcmVzZW5jZUNoYW5uZWw7XG59KHByaXZhdGVfY2hhbm5lbCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgcHJlc2VuY2VfY2hhbm5lbCA9IChwcmVzZW5jZV9jaGFubmVsX1ByZXNlbmNlQ2hhbm5lbCk7XG5cbi8vIEVYVEVSTkFMIE1PRFVMRTogLi9ub2RlX21vZHVsZXMvQHN0YWJsZWxpYi91dGY4L2xpYi91dGY4LmpzXG52YXIgdXRmOCA9IF9fd2VicGFja19yZXF1aXJlX18oMSk7XG5cbi8vIEVYVEVSTkFMIE1PRFVMRTogLi9ub2RlX21vZHVsZXMvQHN0YWJsZWxpYi9iYXNlNjQvbGliL2Jhc2U2NC5qc1xudmFyIGJhc2U2NCA9IF9fd2VicGFja19yZXF1aXJlX18oMCk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvY2hhbm5lbHMvZW5jcnlwdGVkX2NoYW5uZWwudHNcbnZhciBlbmNyeXB0ZWRfY2hhbm5lbF9leHRlbmRzID0gKHVuZGVmaW5lZCAmJiB1bmRlZmluZWQuX19leHRlbmRzKSB8fCAoZnVuY3Rpb24gKCkge1xuICAgIHZhciBleHRlbmRTdGF0aWNzID0gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiB8fFxuICAgICAgICAgICAgKHsgX19wcm90b19fOiBbXSB9IGluc3RhbmNlb2YgQXJyYXkgJiYgZnVuY3Rpb24gKGQsIGIpIHsgZC5fX3Byb3RvX18gPSBiOyB9KSB8fFxuICAgICAgICAgICAgZnVuY3Rpb24gKGQsIGIpIHsgZm9yICh2YXIgcCBpbiBiKSBpZiAoYi5oYXNPd25Qcm9wZXJ0eShwKSkgZFtwXSA9IGJbcF07IH07XG4gICAgICAgIHJldHVybiBleHRlbmRTdGF0aWNzKGQsIGIpO1xuICAgIH07XG4gICAgcmV0dXJuIGZ1bmN0aW9uIChkLCBiKSB7XG4gICAgICAgIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgICAgIGZ1bmN0aW9uIF9fKCkgeyB0aGlzLmNvbnN0cnVjdG9yID0gZDsgfVxuICAgICAgICBkLnByb3RvdHlwZSA9IGIgPT09IG51bGwgPyBPYmplY3QuY3JlYXRlKGIpIDogKF9fLnByb3RvdHlwZSA9IGIucHJvdG90eXBlLCBuZXcgX18oKSk7XG4gICAgfTtcbn0pKCk7XG5cblxuXG5cblxudmFyIGVuY3J5cHRlZF9jaGFubmVsX0VuY3J5cHRlZENoYW5uZWwgPSAoZnVuY3Rpb24gKF9zdXBlcikge1xuICAgIGVuY3J5cHRlZF9jaGFubmVsX2V4dGVuZHMoRW5jcnlwdGVkQ2hhbm5lbCwgX3N1cGVyKTtcbiAgICBmdW5jdGlvbiBFbmNyeXB0ZWRDaGFubmVsKG5hbWUsIHB1c2hlciwgbmFjbCkge1xuICAgICAgICB2YXIgX3RoaXMgPSBfc3VwZXIuY2FsbCh0aGlzLCBuYW1lLCBwdXNoZXIpIHx8IHRoaXM7XG4gICAgICAgIF90aGlzLmtleSA9IG51bGw7XG4gICAgICAgIF90aGlzLm5hY2wgPSBuYWNsO1xuICAgICAgICByZXR1cm4gX3RoaXM7XG4gICAgfVxuICAgIEVuY3J5cHRlZENoYW5uZWwucHJvdG90eXBlLmF1dGhvcml6ZSA9IGZ1bmN0aW9uIChzb2NrZXRJZCwgY2FsbGJhY2spIHtcbiAgICAgICAgdmFyIF90aGlzID0gdGhpcztcbiAgICAgICAgX3N1cGVyLnByb3RvdHlwZS5hdXRob3JpemUuY2FsbCh0aGlzLCBzb2NrZXRJZCwgZnVuY3Rpb24gKGVycm9yLCBhdXRoRGF0YSkge1xuICAgICAgICAgICAgaWYgKGVycm9yKSB7XG4gICAgICAgICAgICAgICAgY2FsbGJhY2soZXJyb3IsIGF1dGhEYXRhKTtcbiAgICAgICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICB2YXIgc2hhcmVkU2VjcmV0ID0gYXV0aERhdGFbJ3NoYXJlZF9zZWNyZXQnXTtcbiAgICAgICAgICAgIGlmICghc2hhcmVkU2VjcmV0KSB7XG4gICAgICAgICAgICAgICAgY2FsbGJhY2sobmV3IEVycm9yKFwiTm8gc2hhcmVkX3NlY3JldCBrZXkgaW4gYXV0aCBwYXlsb2FkIGZvciBlbmNyeXB0ZWQgY2hhbm5lbDogXCIgKyBfdGhpcy5uYW1lKSwgbnVsbCk7XG4gICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgX3RoaXMua2V5ID0gT2JqZWN0KGJhc2U2NFtcImRlY29kZVwiXSkoc2hhcmVkU2VjcmV0KTtcbiAgICAgICAgICAgIGRlbGV0ZSBhdXRoRGF0YVsnc2hhcmVkX3NlY3JldCddO1xuICAgICAgICAgICAgY2FsbGJhY2sobnVsbCwgYXV0aERhdGEpO1xuICAgICAgICB9KTtcbiAgICB9O1xuICAgIEVuY3J5cHRlZENoYW5uZWwucHJvdG90eXBlLnRyaWdnZXIgPSBmdW5jdGlvbiAoZXZlbnQsIGRhdGEpIHtcbiAgICAgICAgdGhyb3cgbmV3IFVuc3VwcG9ydGVkRmVhdHVyZSgnQ2xpZW50IGV2ZW50cyBhcmUgbm90IGN1cnJlbnRseSBzdXBwb3J0ZWQgZm9yIGVuY3J5cHRlZCBjaGFubmVscycpO1xuICAgIH07XG4gICAgRW5jcnlwdGVkQ2hhbm5lbC5wcm90b3R5cGUuaGFuZGxlRXZlbnQgPSBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgdmFyIGV2ZW50TmFtZSA9IGV2ZW50LmV2ZW50O1xuICAgICAgICB2YXIgZGF0YSA9IGV2ZW50LmRhdGE7XG4gICAgICAgIGlmIChldmVudE5hbWUuaW5kZXhPZigncHVzaGVyX2ludGVybmFsOicpID09PSAwIHx8XG4gICAgICAgICAgICBldmVudE5hbWUuaW5kZXhPZigncHVzaGVyOicpID09PSAwKSB7XG4gICAgICAgICAgICBfc3VwZXIucHJvdG90eXBlLmhhbmRsZUV2ZW50LmNhbGwodGhpcywgZXZlbnQpO1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG4gICAgICAgIHRoaXMuaGFuZGxlRW5jcnlwdGVkRXZlbnQoZXZlbnROYW1lLCBkYXRhKTtcbiAgICB9O1xuICAgIEVuY3J5cHRlZENoYW5uZWwucHJvdG90eXBlLmhhbmRsZUVuY3J5cHRlZEV2ZW50ID0gZnVuY3Rpb24gKGV2ZW50LCBkYXRhKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIGlmICghdGhpcy5rZXkpIHtcbiAgICAgICAgICAgIGxvZ2dlci5kZWJ1ZygnUmVjZWl2ZWQgZW5jcnlwdGVkIGV2ZW50IGJlZm9yZSBrZXkgaGFzIGJlZW4gcmV0cmlldmVkIGZyb20gdGhlIGF1dGhFbmRwb2ludCcpO1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG4gICAgICAgIGlmICghZGF0YS5jaXBoZXJ0ZXh0IHx8ICFkYXRhLm5vbmNlKSB7XG4gICAgICAgICAgICBsb2dnZXIuZXJyb3IoJ1VuZXhwZWN0ZWQgZm9ybWF0IGZvciBlbmNyeXB0ZWQgZXZlbnQsIGV4cGVjdGVkIG9iamVjdCB3aXRoIGBjaXBoZXJ0ZXh0YCBhbmQgYG5vbmNlYCBmaWVsZHMsIGdvdDogJyArXG4gICAgICAgICAgICAgICAgZGF0YSk7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cbiAgICAgICAgdmFyIGNpcGhlclRleHQgPSBPYmplY3QoYmFzZTY0W1wiZGVjb2RlXCJdKShkYXRhLmNpcGhlcnRleHQpO1xuICAgICAgICBpZiAoY2lwaGVyVGV4dC5sZW5ndGggPCB0aGlzLm5hY2wuc2VjcmV0Ym94Lm92ZXJoZWFkTGVuZ3RoKSB7XG4gICAgICAgICAgICBsb2dnZXIuZXJyb3IoXCJFeHBlY3RlZCBlbmNyeXB0ZWQgZXZlbnQgY2lwaGVydGV4dCBsZW5ndGggdG8gYmUgXCIgKyB0aGlzLm5hY2wuc2VjcmV0Ym94Lm92ZXJoZWFkTGVuZ3RoICsgXCIsIGdvdDogXCIgKyBjaXBoZXJUZXh0Lmxlbmd0aCk7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cbiAgICAgICAgdmFyIG5vbmNlID0gT2JqZWN0KGJhc2U2NFtcImRlY29kZVwiXSkoZGF0YS5ub25jZSk7XG4gICAgICAgIGlmIChub25jZS5sZW5ndGggPCB0aGlzLm5hY2wuc2VjcmV0Ym94Lm5vbmNlTGVuZ3RoKSB7XG4gICAgICAgICAgICBsb2dnZXIuZXJyb3IoXCJFeHBlY3RlZCBlbmNyeXB0ZWQgZXZlbnQgbm9uY2UgbGVuZ3RoIHRvIGJlIFwiICsgdGhpcy5uYWNsLnNlY3JldGJveC5ub25jZUxlbmd0aCArIFwiLCBnb3Q6IFwiICsgbm9uY2UubGVuZ3RoKTtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuICAgICAgICB2YXIgYnl0ZXMgPSB0aGlzLm5hY2wuc2VjcmV0Ym94Lm9wZW4oY2lwaGVyVGV4dCwgbm9uY2UsIHRoaXMua2V5KTtcbiAgICAgICAgaWYgKGJ5dGVzID09PSBudWxsKSB7XG4gICAgICAgICAgICBsb2dnZXIuZGVidWcoJ0ZhaWxlZCB0byBkZWNyeXB0IGFuIGV2ZW50LCBwcm9iYWJseSBiZWNhdXNlIGl0IHdhcyBlbmNyeXB0ZWQgd2l0aCBhIGRpZmZlcmVudCBrZXkuIEZldGNoaW5nIGEgbmV3IGtleSBmcm9tIHRoZSBhdXRoRW5kcG9pbnQuLi4nKTtcbiAgICAgICAgICAgIHRoaXMuYXV0aG9yaXplKHRoaXMucHVzaGVyLmNvbm5lY3Rpb24uc29ja2V0X2lkLCBmdW5jdGlvbiAoZXJyb3IsIGF1dGhEYXRhKSB7XG4gICAgICAgICAgICAgICAgaWYgKGVycm9yKSB7XG4gICAgICAgICAgICAgICAgICAgIGxvZ2dlci5lcnJvcihcIkZhaWxlZCB0byBtYWtlIGEgcmVxdWVzdCB0byB0aGUgYXV0aEVuZHBvaW50OiBcIiArIGF1dGhEYXRhICsgXCIuIFVuYWJsZSB0byBmZXRjaCBuZXcga2V5LCBzbyBkcm9wcGluZyBlbmNyeXB0ZWQgZXZlbnRcIik7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgYnl0ZXMgPSBfdGhpcy5uYWNsLnNlY3JldGJveC5vcGVuKGNpcGhlclRleHQsIG5vbmNlLCBfdGhpcy5rZXkpO1xuICAgICAgICAgICAgICAgIGlmIChieXRlcyA9PT0gbnVsbCkge1xuICAgICAgICAgICAgICAgICAgICBsb2dnZXIuZXJyb3IoXCJGYWlsZWQgdG8gZGVjcnlwdCBldmVudCB3aXRoIG5ldyBrZXkuIERyb3BwaW5nIGVuY3J5cHRlZCBldmVudFwiKTtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBfdGhpcy5lbWl0KGV2ZW50LCBfdGhpcy5nZXREYXRhVG9FbWl0KGJ5dGVzKSk7XG4gICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy5lbWl0KGV2ZW50LCB0aGlzLmdldERhdGFUb0VtaXQoYnl0ZXMpKTtcbiAgICB9O1xuICAgIEVuY3J5cHRlZENoYW5uZWwucHJvdG90eXBlLmdldERhdGFUb0VtaXQgPSBmdW5jdGlvbiAoYnl0ZXMpIHtcbiAgICAgICAgdmFyIHJhdyA9IE9iamVjdCh1dGY4W1wiZGVjb2RlXCJdKShieXRlcyk7XG4gICAgICAgIHRyeSB7XG4gICAgICAgICAgICByZXR1cm4gSlNPTi5wYXJzZShyYXcpO1xuICAgICAgICB9XG4gICAgICAgIGNhdGNoIChfYSkge1xuICAgICAgICAgICAgcmV0dXJuIHJhdztcbiAgICAgICAgfVxuICAgIH07XG4gICAgcmV0dXJuIEVuY3J5cHRlZENoYW5uZWw7XG59KHByaXZhdGVfY2hhbm5lbCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgZW5jcnlwdGVkX2NoYW5uZWwgPSAoZW5jcnlwdGVkX2NoYW5uZWxfRW5jcnlwdGVkQ2hhbm5lbCk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvY29ubmVjdGlvbi9jb25uZWN0aW9uX21hbmFnZXIudHNcbnZhciBjb25uZWN0aW9uX21hbmFnZXJfZXh0ZW5kcyA9ICh1bmRlZmluZWQgJiYgdW5kZWZpbmVkLl9fZXh0ZW5kcykgfHwgKGZ1bmN0aW9uICgpIHtcbiAgICB2YXIgZXh0ZW5kU3RhdGljcyA9IGZ1bmN0aW9uIChkLCBiKSB7XG4gICAgICAgIGV4dGVuZFN0YXRpY3MgPSBPYmplY3Quc2V0UHJvdG90eXBlT2YgfHxcbiAgICAgICAgICAgICh7IF9fcHJvdG9fXzogW10gfSBpbnN0YW5jZW9mIEFycmF5ICYmIGZ1bmN0aW9uIChkLCBiKSB7IGQuX19wcm90b19fID0gYjsgfSkgfHxcbiAgICAgICAgICAgIGZ1bmN0aW9uIChkLCBiKSB7IGZvciAodmFyIHAgaW4gYikgaWYgKGIuaGFzT3duUHJvcGVydHkocCkpIGRbcF0gPSBiW3BdOyB9O1xuICAgICAgICByZXR1cm4gZXh0ZW5kU3RhdGljcyhkLCBiKTtcbiAgICB9O1xuICAgIHJldHVybiBmdW5jdGlvbiAoZCwgYikge1xuICAgICAgICBleHRlbmRTdGF0aWNzKGQsIGIpO1xuICAgICAgICBmdW5jdGlvbiBfXygpIHsgdGhpcy5jb25zdHJ1Y3RvciA9IGQ7IH1cbiAgICAgICAgZC5wcm90b3R5cGUgPSBiID09PSBudWxsID8gT2JqZWN0LmNyZWF0ZShiKSA6IChfXy5wcm90b3R5cGUgPSBiLnByb3RvdHlwZSwgbmV3IF9fKCkpO1xuICAgIH07XG59KSgpO1xuXG5cblxuXG5cbnZhciBjb25uZWN0aW9uX21hbmFnZXJfQ29ubmVjdGlvbk1hbmFnZXIgPSAoZnVuY3Rpb24gKF9zdXBlcikge1xuICAgIGNvbm5lY3Rpb25fbWFuYWdlcl9leHRlbmRzKENvbm5lY3Rpb25NYW5hZ2VyLCBfc3VwZXIpO1xuICAgIGZ1bmN0aW9uIENvbm5lY3Rpb25NYW5hZ2VyKGtleSwgb3B0aW9ucykge1xuICAgICAgICB2YXIgX3RoaXMgPSBfc3VwZXIuY2FsbCh0aGlzKSB8fCB0aGlzO1xuICAgICAgICBfdGhpcy5zdGF0ZSA9ICdpbml0aWFsaXplZCc7XG4gICAgICAgIF90aGlzLmNvbm5lY3Rpb24gPSBudWxsO1xuICAgICAgICBfdGhpcy5rZXkgPSBrZXk7XG4gICAgICAgIF90aGlzLm9wdGlvbnMgPSBvcHRpb25zO1xuICAgICAgICBfdGhpcy50aW1lbGluZSA9IF90aGlzLm9wdGlvbnMudGltZWxpbmU7XG4gICAgICAgIF90aGlzLnVzaW5nVExTID0gX3RoaXMub3B0aW9ucy51c2VUTFM7XG4gICAgICAgIF90aGlzLmVycm9yQ2FsbGJhY2tzID0gX3RoaXMuYnVpbGRFcnJvckNhbGxiYWNrcygpO1xuICAgICAgICBfdGhpcy5jb25uZWN0aW9uQ2FsbGJhY2tzID0gX3RoaXMuYnVpbGRDb25uZWN0aW9uQ2FsbGJhY2tzKF90aGlzLmVycm9yQ2FsbGJhY2tzKTtcbiAgICAgICAgX3RoaXMuaGFuZHNoYWtlQ2FsbGJhY2tzID0gX3RoaXMuYnVpbGRIYW5kc2hha2VDYWxsYmFja3MoX3RoaXMuZXJyb3JDYWxsYmFja3MpO1xuICAgICAgICB2YXIgTmV0d29yayA9IHJ1bnRpbWUuZ2V0TmV0d29yaygpO1xuICAgICAgICBOZXR3b3JrLmJpbmQoJ29ubGluZScsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIF90aGlzLnRpbWVsaW5lLmluZm8oeyBuZXRpbmZvOiAnb25saW5lJyB9KTtcbiAgICAgICAgICAgIGlmIChfdGhpcy5zdGF0ZSA9PT0gJ2Nvbm5lY3RpbmcnIHx8IF90aGlzLnN0YXRlID09PSAndW5hdmFpbGFibGUnKSB7XG4gICAgICAgICAgICAgICAgX3RoaXMucmV0cnlJbigwKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICAgIE5ldHdvcmsuYmluZCgnb2ZmbGluZScsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIF90aGlzLnRpbWVsaW5lLmluZm8oeyBuZXRpbmZvOiAnb2ZmbGluZScgfSk7XG4gICAgICAgICAgICBpZiAoX3RoaXMuY29ubmVjdGlvbikge1xuICAgICAgICAgICAgICAgIF90aGlzLnNlbmRBY3Rpdml0eUNoZWNrKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgICAgICBfdGhpcy51cGRhdGVTdHJhdGVneSgpO1xuICAgICAgICByZXR1cm4gX3RoaXM7XG4gICAgfVxuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5jb25uZWN0ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBpZiAodGhpcy5jb25uZWN0aW9uIHx8IHRoaXMucnVubmVyKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cbiAgICAgICAgaWYgKCF0aGlzLnN0cmF0ZWd5LmlzU3VwcG9ydGVkKCkpIHtcbiAgICAgICAgICAgIHRoaXMudXBkYXRlU3RhdGUoJ2ZhaWxlZCcpO1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG4gICAgICAgIHRoaXMudXBkYXRlU3RhdGUoJ2Nvbm5lY3RpbmcnKTtcbiAgICAgICAgdGhpcy5zdGFydENvbm5lY3RpbmcoKTtcbiAgICAgICAgdGhpcy5zZXRVbmF2YWlsYWJsZVRpbWVyKCk7XG4gICAgfTtcbiAgICBDb25uZWN0aW9uTWFuYWdlci5wcm90b3R5cGUuc2VuZCA9IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgIGlmICh0aGlzLmNvbm5lY3Rpb24pIHtcbiAgICAgICAgICAgIHJldHVybiB0aGlzLmNvbm5lY3Rpb24uc2VuZChkYXRhKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLnNlbmRfZXZlbnQgPSBmdW5jdGlvbiAobmFtZSwgZGF0YSwgY2hhbm5lbCkge1xuICAgICAgICBpZiAodGhpcy5jb25uZWN0aW9uKSB7XG4gICAgICAgICAgICByZXR1cm4gdGhpcy5jb25uZWN0aW9uLnNlbmRfZXZlbnQobmFtZSwgZGF0YSwgY2hhbm5lbCk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5kaXNjb25uZWN0ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB0aGlzLmRpc2Nvbm5lY3RJbnRlcm5hbGx5KCk7XG4gICAgICAgIHRoaXMudXBkYXRlU3RhdGUoJ2Rpc2Nvbm5lY3RlZCcpO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLmlzVXNpbmdUTFMgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiB0aGlzLnVzaW5nVExTO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLnN0YXJ0Q29ubmVjdGluZyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIF90aGlzID0gdGhpcztcbiAgICAgICAgdmFyIGNhbGxiYWNrID0gZnVuY3Rpb24gKGVycm9yLCBoYW5kc2hha2UpIHtcbiAgICAgICAgICAgIGlmIChlcnJvcikge1xuICAgICAgICAgICAgICAgIF90aGlzLnJ1bm5lciA9IF90aGlzLnN0cmF0ZWd5LmNvbm5lY3QoMCwgY2FsbGJhY2spO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgaWYgKGhhbmRzaGFrZS5hY3Rpb24gPT09ICdlcnJvcicpIHtcbiAgICAgICAgICAgICAgICAgICAgX3RoaXMuZW1pdCgnZXJyb3InLCB7XG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlOiAnSGFuZHNoYWtlRXJyb3InLFxuICAgICAgICAgICAgICAgICAgICAgICAgZXJyb3I6IGhhbmRzaGFrZS5lcnJvclxuICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgX3RoaXMudGltZWxpbmUuZXJyb3IoeyBoYW5kc2hha2VFcnJvcjogaGFuZHNoYWtlLmVycm9yIH0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgX3RoaXMuYWJvcnRDb25uZWN0aW5nKCk7XG4gICAgICAgICAgICAgICAgICAgIF90aGlzLmhhbmRzaGFrZUNhbGxiYWNrc1toYW5kc2hha2UuYWN0aW9uXShoYW5kc2hha2UpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cbiAgICAgICAgfTtcbiAgICAgICAgdGhpcy5ydW5uZXIgPSB0aGlzLnN0cmF0ZWd5LmNvbm5lY3QoMCwgY2FsbGJhY2spO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLmFib3J0Q29ubmVjdGluZyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMucnVubmVyKSB7XG4gICAgICAgICAgICB0aGlzLnJ1bm5lci5hYm9ydCgpO1xuICAgICAgICAgICAgdGhpcy5ydW5uZXIgPSBudWxsO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBDb25uZWN0aW9uTWFuYWdlci5wcm90b3R5cGUuZGlzY29ubmVjdEludGVybmFsbHkgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMuYWJvcnRDb25uZWN0aW5nKCk7XG4gICAgICAgIHRoaXMuY2xlYXJSZXRyeVRpbWVyKCk7XG4gICAgICAgIHRoaXMuY2xlYXJVbmF2YWlsYWJsZVRpbWVyKCk7XG4gICAgICAgIGlmICh0aGlzLmNvbm5lY3Rpb24pIHtcbiAgICAgICAgICAgIHZhciBjb25uZWN0aW9uID0gdGhpcy5hYmFuZG9uQ29ubmVjdGlvbigpO1xuICAgICAgICAgICAgY29ubmVjdGlvbi5jbG9zZSgpO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBDb25uZWN0aW9uTWFuYWdlci5wcm90b3R5cGUudXBkYXRlU3RyYXRlZ3kgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMuc3RyYXRlZ3kgPSB0aGlzLm9wdGlvbnMuZ2V0U3RyYXRlZ3koe1xuICAgICAgICAgICAga2V5OiB0aGlzLmtleSxcbiAgICAgICAgICAgIHRpbWVsaW5lOiB0aGlzLnRpbWVsaW5lLFxuICAgICAgICAgICAgdXNlVExTOiB0aGlzLnVzaW5nVExTXG4gICAgICAgIH0pO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLnJldHJ5SW4gPSBmdW5jdGlvbiAoZGVsYXkpIHtcbiAgICAgICAgdmFyIF90aGlzID0gdGhpcztcbiAgICAgICAgdGhpcy50aW1lbGluZS5pbmZvKHsgYWN0aW9uOiAncmV0cnknLCBkZWxheTogZGVsYXkgfSk7XG4gICAgICAgIGlmIChkZWxheSA+IDApIHtcbiAgICAgICAgICAgIHRoaXMuZW1pdCgnY29ubmVjdGluZ19pbicsIE1hdGgucm91bmQoZGVsYXkgLyAxMDAwKSk7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy5yZXRyeVRpbWVyID0gbmV3IE9uZU9mZlRpbWVyKGRlbGF5IHx8IDAsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIF90aGlzLmRpc2Nvbm5lY3RJbnRlcm5hbGx5KCk7XG4gICAgICAgICAgICBfdGhpcy5jb25uZWN0KCk7XG4gICAgICAgIH0pO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLmNsZWFyUmV0cnlUaW1lciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMucmV0cnlUaW1lcikge1xuICAgICAgICAgICAgdGhpcy5yZXRyeVRpbWVyLmVuc3VyZUFib3J0ZWQoKTtcbiAgICAgICAgICAgIHRoaXMucmV0cnlUaW1lciA9IG51bGw7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5zZXRVbmF2YWlsYWJsZVRpbWVyID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICB0aGlzLnVuYXZhaWxhYmxlVGltZXIgPSBuZXcgT25lT2ZmVGltZXIodGhpcy5vcHRpb25zLnVuYXZhaWxhYmxlVGltZW91dCwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgX3RoaXMudXBkYXRlU3RhdGUoJ3VuYXZhaWxhYmxlJyk7XG4gICAgICAgIH0pO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLmNsZWFyVW5hdmFpbGFibGVUaW1lciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMudW5hdmFpbGFibGVUaW1lcikge1xuICAgICAgICAgICAgdGhpcy51bmF2YWlsYWJsZVRpbWVyLmVuc3VyZUFib3J0ZWQoKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLnNlbmRBY3Rpdml0eUNoZWNrID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICB0aGlzLnN0b3BBY3Rpdml0eUNoZWNrKCk7XG4gICAgICAgIHRoaXMuY29ubmVjdGlvbi5waW5nKCk7XG4gICAgICAgIHRoaXMuYWN0aXZpdHlUaW1lciA9IG5ldyBPbmVPZmZUaW1lcih0aGlzLm9wdGlvbnMucG9uZ1RpbWVvdXQsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIF90aGlzLnRpbWVsaW5lLmVycm9yKHsgcG9uZ190aW1lZF9vdXQ6IF90aGlzLm9wdGlvbnMucG9uZ1RpbWVvdXQgfSk7XG4gICAgICAgICAgICBfdGhpcy5yZXRyeUluKDApO1xuICAgICAgICB9KTtcbiAgICB9O1xuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5yZXNldEFjdGl2aXR5Q2hlY2sgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIHRoaXMuc3RvcEFjdGl2aXR5Q2hlY2soKTtcbiAgICAgICAgaWYgKHRoaXMuY29ubmVjdGlvbiAmJiAhdGhpcy5jb25uZWN0aW9uLmhhbmRsZXNBY3Rpdml0eUNoZWNrcygpKSB7XG4gICAgICAgICAgICB0aGlzLmFjdGl2aXR5VGltZXIgPSBuZXcgT25lT2ZmVGltZXIodGhpcy5hY3Rpdml0eVRpbWVvdXQsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5zZW5kQWN0aXZpdHlDaGVjaygpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5zdG9wQWN0aXZpdHlDaGVjayA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMuYWN0aXZpdHlUaW1lcikge1xuICAgICAgICAgICAgdGhpcy5hY3Rpdml0eVRpbWVyLmVuc3VyZUFib3J0ZWQoKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLmJ1aWxkQ29ubmVjdGlvbkNhbGxiYWNrcyA9IGZ1bmN0aW9uIChlcnJvckNhbGxiYWNrcykge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICByZXR1cm4gZXh0ZW5kKHt9LCBlcnJvckNhbGxiYWNrcywge1xuICAgICAgICAgICAgbWVzc2FnZTogZnVuY3Rpb24gKG1lc3NhZ2UpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5yZXNldEFjdGl2aXR5Q2hlY2soKTtcbiAgICAgICAgICAgICAgICBfdGhpcy5lbWl0KCdtZXNzYWdlJywgbWVzc2FnZSk7XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgcGluZzogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIF90aGlzLnNlbmRfZXZlbnQoJ3B1c2hlcjpwb25nJywge30pO1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIGFjdGl2aXR5OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgX3RoaXMucmVzZXRBY3Rpdml0eUNoZWNrKCk7XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgZXJyb3I6IGZ1bmN0aW9uIChlcnJvcikge1xuICAgICAgICAgICAgICAgIF90aGlzLmVtaXQoJ2Vycm9yJywgZXJyb3IpO1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIGNsb3NlZDogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIF90aGlzLmFiYW5kb25Db25uZWN0aW9uKCk7XG4gICAgICAgICAgICAgICAgaWYgKF90aGlzLnNob3VsZFJldHJ5KCkpIHtcbiAgICAgICAgICAgICAgICAgICAgX3RoaXMucmV0cnlJbigxMDAwKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLmJ1aWxkSGFuZHNoYWtlQ2FsbGJhY2tzID0gZnVuY3Rpb24gKGVycm9yQ2FsbGJhY2tzKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIHJldHVybiBleHRlbmQoe30sIGVycm9yQ2FsbGJhY2tzLCB7XG4gICAgICAgICAgICBjb25uZWN0ZWQ6IGZ1bmN0aW9uIChoYW5kc2hha2UpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5hY3Rpdml0eVRpbWVvdXQgPSBNYXRoLm1pbihfdGhpcy5vcHRpb25zLmFjdGl2aXR5VGltZW91dCwgaGFuZHNoYWtlLmFjdGl2aXR5VGltZW91dCwgaGFuZHNoYWtlLmNvbm5lY3Rpb24uYWN0aXZpdHlUaW1lb3V0IHx8IEluZmluaXR5KTtcbiAgICAgICAgICAgICAgICBfdGhpcy5jbGVhclVuYXZhaWxhYmxlVGltZXIoKTtcbiAgICAgICAgICAgICAgICBfdGhpcy5zZXRDb25uZWN0aW9uKGhhbmRzaGFrZS5jb25uZWN0aW9uKTtcbiAgICAgICAgICAgICAgICBfdGhpcy5zb2NrZXRfaWQgPSBfdGhpcy5jb25uZWN0aW9uLmlkO1xuICAgICAgICAgICAgICAgIF90aGlzLnVwZGF0ZVN0YXRlKCdjb25uZWN0ZWQnLCB7IHNvY2tldF9pZDogX3RoaXMuc29ja2V0X2lkIH0pO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9O1xuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5idWlsZEVycm9yQ2FsbGJhY2tzID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICB2YXIgd2l0aEVycm9yRW1pdHRlZCA9IGZ1bmN0aW9uIChjYWxsYmFjaykge1xuICAgICAgICAgICAgcmV0dXJuIGZ1bmN0aW9uIChyZXN1bHQpIHtcbiAgICAgICAgICAgICAgICBpZiAocmVzdWx0LmVycm9yKSB7XG4gICAgICAgICAgICAgICAgICAgIF90aGlzLmVtaXQoJ2Vycm9yJywgeyB0eXBlOiAnV2ViU29ja2V0RXJyb3InLCBlcnJvcjogcmVzdWx0LmVycm9yIH0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBjYWxsYmFjayhyZXN1bHQpO1xuICAgICAgICAgICAgfTtcbiAgICAgICAgfTtcbiAgICAgICAgcmV0dXJuIHtcbiAgICAgICAgICAgIHRsc19vbmx5OiB3aXRoRXJyb3JFbWl0dGVkKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy51c2luZ1RMUyA9IHRydWU7XG4gICAgICAgICAgICAgICAgX3RoaXMudXBkYXRlU3RyYXRlZ3koKTtcbiAgICAgICAgICAgICAgICBfdGhpcy5yZXRyeUluKDApO1xuICAgICAgICAgICAgfSksXG4gICAgICAgICAgICByZWZ1c2VkOiB3aXRoRXJyb3JFbWl0dGVkKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5kaXNjb25uZWN0KCk7XG4gICAgICAgICAgICB9KSxcbiAgICAgICAgICAgIGJhY2tvZmY6IHdpdGhFcnJvckVtaXR0ZWQoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIF90aGlzLnJldHJ5SW4oMTAwMCk7XG4gICAgICAgICAgICB9KSxcbiAgICAgICAgICAgIHJldHJ5OiB3aXRoRXJyb3JFbWl0dGVkKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBfdGhpcy5yZXRyeUluKDApO1xuICAgICAgICAgICAgfSlcbiAgICAgICAgfTtcbiAgICB9O1xuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5zZXRDb25uZWN0aW9uID0gZnVuY3Rpb24gKGNvbm5lY3Rpb24pIHtcbiAgICAgICAgdGhpcy5jb25uZWN0aW9uID0gY29ubmVjdGlvbjtcbiAgICAgICAgZm9yICh2YXIgZXZlbnQgaW4gdGhpcy5jb25uZWN0aW9uQ2FsbGJhY2tzKSB7XG4gICAgICAgICAgICB0aGlzLmNvbm5lY3Rpb24uYmluZChldmVudCwgdGhpcy5jb25uZWN0aW9uQ2FsbGJhY2tzW2V2ZW50XSk7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy5yZXNldEFjdGl2aXR5Q2hlY2soKTtcbiAgICB9O1xuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5hYmFuZG9uQ29ubmVjdGlvbiA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKCF0aGlzLmNvbm5lY3Rpb24pIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuICAgICAgICB0aGlzLnN0b3BBY3Rpdml0eUNoZWNrKCk7XG4gICAgICAgIGZvciAodmFyIGV2ZW50IGluIHRoaXMuY29ubmVjdGlvbkNhbGxiYWNrcykge1xuICAgICAgICAgICAgdGhpcy5jb25uZWN0aW9uLnVuYmluZChldmVudCwgdGhpcy5jb25uZWN0aW9uQ2FsbGJhY2tzW2V2ZW50XSk7XG4gICAgICAgIH1cbiAgICAgICAgdmFyIGNvbm5lY3Rpb24gPSB0aGlzLmNvbm5lY3Rpb247XG4gICAgICAgIHRoaXMuY29ubmVjdGlvbiA9IG51bGw7XG4gICAgICAgIHJldHVybiBjb25uZWN0aW9uO1xuICAgIH07XG4gICAgQ29ubmVjdGlvbk1hbmFnZXIucHJvdG90eXBlLnVwZGF0ZVN0YXRlID0gZnVuY3Rpb24gKG5ld1N0YXRlLCBkYXRhKSB7XG4gICAgICAgIHZhciBwcmV2aW91c1N0YXRlID0gdGhpcy5zdGF0ZTtcbiAgICAgICAgdGhpcy5zdGF0ZSA9IG5ld1N0YXRlO1xuICAgICAgICBpZiAocHJldmlvdXNTdGF0ZSAhPT0gbmV3U3RhdGUpIHtcbiAgICAgICAgICAgIHZhciBuZXdTdGF0ZURlc2NyaXB0aW9uID0gbmV3U3RhdGU7XG4gICAgICAgICAgICBpZiAobmV3U3RhdGVEZXNjcmlwdGlvbiA9PT0gJ2Nvbm5lY3RlZCcpIHtcbiAgICAgICAgICAgICAgICBuZXdTdGF0ZURlc2NyaXB0aW9uICs9ICcgd2l0aCBuZXcgc29ja2V0IElEICcgKyBkYXRhLnNvY2tldF9pZDtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGxvZ2dlci5kZWJ1ZygnU3RhdGUgY2hhbmdlZCcsIHByZXZpb3VzU3RhdGUgKyAnIC0+ICcgKyBuZXdTdGF0ZURlc2NyaXB0aW9uKTtcbiAgICAgICAgICAgIHRoaXMudGltZWxpbmUuaW5mbyh7IHN0YXRlOiBuZXdTdGF0ZSwgcGFyYW1zOiBkYXRhIH0pO1xuICAgICAgICAgICAgdGhpcy5lbWl0KCdzdGF0ZV9jaGFuZ2UnLCB7IHByZXZpb3VzOiBwcmV2aW91c1N0YXRlLCBjdXJyZW50OiBuZXdTdGF0ZSB9KTtcbiAgICAgICAgICAgIHRoaXMuZW1pdChuZXdTdGF0ZSwgZGF0YSk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIENvbm5lY3Rpb25NYW5hZ2VyLnByb3RvdHlwZS5zaG91bGRSZXRyeSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMuc3RhdGUgPT09ICdjb25uZWN0aW5nJyB8fCB0aGlzLnN0YXRlID09PSAnY29ubmVjdGVkJztcbiAgICB9O1xuICAgIHJldHVybiBDb25uZWN0aW9uTWFuYWdlcjtcbn0oZGlzcGF0Y2hlcikpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgY29ubmVjdGlvbl9tYW5hZ2VyID0gKGNvbm5lY3Rpb25fbWFuYWdlcl9Db25uZWN0aW9uTWFuYWdlcik7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvY2hhbm5lbHMvY2hhbm5lbHMudHNcblxuXG5cblxudmFyIGNoYW5uZWxzX0NoYW5uZWxzID0gKGZ1bmN0aW9uICgpIHtcbiAgICBmdW5jdGlvbiBDaGFubmVscygpIHtcbiAgICAgICAgdGhpcy5jaGFubmVscyA9IHt9O1xuICAgIH1cbiAgICBDaGFubmVscy5wcm90b3R5cGUuYWRkID0gZnVuY3Rpb24gKG5hbWUsIHB1c2hlcikge1xuICAgICAgICBpZiAoIXRoaXMuY2hhbm5lbHNbbmFtZV0pIHtcbiAgICAgICAgICAgIHRoaXMuY2hhbm5lbHNbbmFtZV0gPSBjcmVhdGVDaGFubmVsKG5hbWUsIHB1c2hlcik7XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIHRoaXMuY2hhbm5lbHNbbmFtZV07XG4gICAgfTtcbiAgICBDaGFubmVscy5wcm90b3R5cGUuYWxsID0gZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdmFsdWVzKHRoaXMuY2hhbm5lbHMpO1xuICAgIH07XG4gICAgQ2hhbm5lbHMucHJvdG90eXBlLmZpbmQgPSBmdW5jdGlvbiAobmFtZSkge1xuICAgICAgICByZXR1cm4gdGhpcy5jaGFubmVsc1tuYW1lXTtcbiAgICB9O1xuICAgIENoYW5uZWxzLnByb3RvdHlwZS5yZW1vdmUgPSBmdW5jdGlvbiAobmFtZSkge1xuICAgICAgICB2YXIgY2hhbm5lbCA9IHRoaXMuY2hhbm5lbHNbbmFtZV07XG4gICAgICAgIGRlbGV0ZSB0aGlzLmNoYW5uZWxzW25hbWVdO1xuICAgICAgICByZXR1cm4gY2hhbm5lbDtcbiAgICB9O1xuICAgIENoYW5uZWxzLnByb3RvdHlwZS5kaXNjb25uZWN0ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBvYmplY3RBcHBseSh0aGlzLmNoYW5uZWxzLCBmdW5jdGlvbiAoY2hhbm5lbCkge1xuICAgICAgICAgICAgY2hhbm5lbC5kaXNjb25uZWN0KCk7XG4gICAgICAgIH0pO1xuICAgIH07XG4gICAgcmV0dXJuIENoYW5uZWxzO1xufSgpKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIGNoYW5uZWxzID0gKGNoYW5uZWxzX0NoYW5uZWxzKTtcbmZ1bmN0aW9uIGNyZWF0ZUNoYW5uZWwobmFtZSwgcHVzaGVyKSB7XG4gICAgaWYgKG5hbWUuaW5kZXhPZigncHJpdmF0ZS1lbmNyeXB0ZWQtJykgPT09IDApIHtcbiAgICAgICAgaWYgKHB1c2hlci5jb25maWcubmFjbCkge1xuICAgICAgICAgICAgcmV0dXJuIGZhY3RvcnkuY3JlYXRlRW5jcnlwdGVkQ2hhbm5lbChuYW1lLCBwdXNoZXIsIHB1c2hlci5jb25maWcubmFjbCk7XG4gICAgICAgIH1cbiAgICAgICAgdmFyIGVyck1zZyA9ICdUcmllZCB0byBzdWJzY3JpYmUgdG8gYSBwcml2YXRlLWVuY3J5cHRlZC0gY2hhbm5lbCBidXQgbm8gbmFjbCBpbXBsZW1lbnRhdGlvbiBhdmFpbGFibGUnO1xuICAgICAgICB2YXIgc3VmZml4ID0gdXJsX3N0b3JlLmJ1aWxkTG9nU3VmZml4KCdlbmNyeXB0ZWRDaGFubmVsU3VwcG9ydCcpO1xuICAgICAgICB0aHJvdyBuZXcgVW5zdXBwb3J0ZWRGZWF0dXJlKGVyck1zZyArIFwiLiBcIiArIHN1ZmZpeCk7XG4gICAgfVxuICAgIGVsc2UgaWYgKG5hbWUuaW5kZXhPZigncHJpdmF0ZS0nKSA9PT0gMCkge1xuICAgICAgICByZXR1cm4gZmFjdG9yeS5jcmVhdGVQcml2YXRlQ2hhbm5lbChuYW1lLCBwdXNoZXIpO1xuICAgIH1cbiAgICBlbHNlIGlmIChuYW1lLmluZGV4T2YoJ3ByZXNlbmNlLScpID09PSAwKSB7XG4gICAgICAgIHJldHVybiBmYWN0b3J5LmNyZWF0ZVByZXNlbmNlQ2hhbm5lbChuYW1lLCBwdXNoZXIpO1xuICAgIH1cbiAgICBlbHNlIHtcbiAgICAgICAgcmV0dXJuIGZhY3RvcnkuY3JlYXRlQ2hhbm5lbChuYW1lLCBwdXNoZXIpO1xuICAgIH1cbn1cblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS91dGlscy9mYWN0b3J5LnRzXG5cblxuXG5cblxuXG5cblxuXG5cbnZhciBGYWN0b3J5ID0ge1xuICAgIGNyZWF0ZUNoYW5uZWxzOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBuZXcgY2hhbm5lbHMoKTtcbiAgICB9LFxuICAgIGNyZWF0ZUNvbm5lY3Rpb25NYW5hZ2VyOiBmdW5jdGlvbiAoa2V5LCBvcHRpb25zKSB7XG4gICAgICAgIHJldHVybiBuZXcgY29ubmVjdGlvbl9tYW5hZ2VyKGtleSwgb3B0aW9ucyk7XG4gICAgfSxcbiAgICBjcmVhdGVDaGFubmVsOiBmdW5jdGlvbiAobmFtZSwgcHVzaGVyKSB7XG4gICAgICAgIHJldHVybiBuZXcgY2hhbm5lbHNfY2hhbm5lbChuYW1lLCBwdXNoZXIpO1xuICAgIH0sXG4gICAgY3JlYXRlUHJpdmF0ZUNoYW5uZWw6IGZ1bmN0aW9uIChuYW1lLCBwdXNoZXIpIHtcbiAgICAgICAgcmV0dXJuIG5ldyBwcml2YXRlX2NoYW5uZWwobmFtZSwgcHVzaGVyKTtcbiAgICB9LFxuICAgIGNyZWF0ZVByZXNlbmNlQ2hhbm5lbDogZnVuY3Rpb24gKG5hbWUsIHB1c2hlcikge1xuICAgICAgICByZXR1cm4gbmV3IHByZXNlbmNlX2NoYW5uZWwobmFtZSwgcHVzaGVyKTtcbiAgICB9LFxuICAgIGNyZWF0ZUVuY3J5cHRlZENoYW5uZWw6IGZ1bmN0aW9uIChuYW1lLCBwdXNoZXIsIG5hY2wpIHtcbiAgICAgICAgcmV0dXJuIG5ldyBlbmNyeXB0ZWRfY2hhbm5lbChuYW1lLCBwdXNoZXIsIG5hY2wpO1xuICAgIH0sXG4gICAgY3JlYXRlVGltZWxpbmVTZW5kZXI6IGZ1bmN0aW9uICh0aW1lbGluZSwgb3B0aW9ucykge1xuICAgICAgICByZXR1cm4gbmV3IHRpbWVsaW5lX3NlbmRlcih0aW1lbGluZSwgb3B0aW9ucyk7XG4gICAgfSxcbiAgICBjcmVhdGVBdXRob3JpemVyOiBmdW5jdGlvbiAoY2hhbm5lbCwgb3B0aW9ucykge1xuICAgICAgICBpZiAob3B0aW9ucy5hdXRob3JpemVyKSB7XG4gICAgICAgICAgICByZXR1cm4gb3B0aW9ucy5hdXRob3JpemVyKGNoYW5uZWwsIG9wdGlvbnMpO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiBuZXcgcHVzaGVyX2F1dGhvcml6ZXIoY2hhbm5lbCwgb3B0aW9ucyk7XG4gICAgfSxcbiAgICBjcmVhdGVIYW5kc2hha2U6IGZ1bmN0aW9uICh0cmFuc3BvcnQsIGNhbGxiYWNrKSB7XG4gICAgICAgIHJldHVybiBuZXcgY29ubmVjdGlvbl9oYW5kc2hha2UodHJhbnNwb3J0LCBjYWxsYmFjayk7XG4gICAgfSxcbiAgICBjcmVhdGVBc3Npc3RhbnRUb1RoZVRyYW5zcG9ydE1hbmFnZXI6IGZ1bmN0aW9uIChtYW5hZ2VyLCB0cmFuc3BvcnQsIG9wdGlvbnMpIHtcbiAgICAgICAgcmV0dXJuIG5ldyBhc3Npc3RhbnRfdG9fdGhlX3RyYW5zcG9ydF9tYW5hZ2VyKG1hbmFnZXIsIHRyYW5zcG9ydCwgb3B0aW9ucyk7XG4gICAgfVxufTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIGZhY3RvcnkgPSAoRmFjdG9yeSk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvdHJhbnNwb3J0cy90cmFuc3BvcnRfbWFuYWdlci50c1xuXG52YXIgdHJhbnNwb3J0X21hbmFnZXJfVHJhbnNwb3J0TWFuYWdlciA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gVHJhbnNwb3J0TWFuYWdlcihvcHRpb25zKSB7XG4gICAgICAgIHRoaXMub3B0aW9ucyA9IG9wdGlvbnMgfHwge307XG4gICAgICAgIHRoaXMubGl2ZXNMZWZ0ID0gdGhpcy5vcHRpb25zLmxpdmVzIHx8IEluZmluaXR5O1xuICAgIH1cbiAgICBUcmFuc3BvcnRNYW5hZ2VyLnByb3RvdHlwZS5nZXRBc3Npc3RhbnQgPSBmdW5jdGlvbiAodHJhbnNwb3J0KSB7XG4gICAgICAgIHJldHVybiBmYWN0b3J5LmNyZWF0ZUFzc2lzdGFudFRvVGhlVHJhbnNwb3J0TWFuYWdlcih0aGlzLCB0cmFuc3BvcnQsIHtcbiAgICAgICAgICAgIG1pblBpbmdEZWxheTogdGhpcy5vcHRpb25zLm1pblBpbmdEZWxheSxcbiAgICAgICAgICAgIG1heFBpbmdEZWxheTogdGhpcy5vcHRpb25zLm1heFBpbmdEZWxheVxuICAgICAgICB9KTtcbiAgICB9O1xuICAgIFRyYW5zcG9ydE1hbmFnZXIucHJvdG90eXBlLmlzQWxpdmUgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiB0aGlzLmxpdmVzTGVmdCA+IDA7XG4gICAgfTtcbiAgICBUcmFuc3BvcnRNYW5hZ2VyLnByb3RvdHlwZS5yZXBvcnREZWF0aCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy5saXZlc0xlZnQgLT0gMTtcbiAgICB9O1xuICAgIHJldHVybiBUcmFuc3BvcnRNYW5hZ2VyO1xufSgpKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHRyYW5zcG9ydF9tYW5hZ2VyID0gKHRyYW5zcG9ydF9tYW5hZ2VyX1RyYW5zcG9ydE1hbmFnZXIpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3N0cmF0ZWdpZXMvc2VxdWVudGlhbF9zdHJhdGVneS50c1xuXG5cblxudmFyIHNlcXVlbnRpYWxfc3RyYXRlZ3lfU2VxdWVudGlhbFN0cmF0ZWd5ID0gKGZ1bmN0aW9uICgpIHtcbiAgICBmdW5jdGlvbiBTZXF1ZW50aWFsU3RyYXRlZ3koc3RyYXRlZ2llcywgb3B0aW9ucykge1xuICAgICAgICB0aGlzLnN0cmF0ZWdpZXMgPSBzdHJhdGVnaWVzO1xuICAgICAgICB0aGlzLmxvb3AgPSBCb29sZWFuKG9wdGlvbnMubG9vcCk7XG4gICAgICAgIHRoaXMuZmFpbEZhc3QgPSBCb29sZWFuKG9wdGlvbnMuZmFpbEZhc3QpO1xuICAgICAgICB0aGlzLnRpbWVvdXQgPSBvcHRpb25zLnRpbWVvdXQ7XG4gICAgICAgIHRoaXMudGltZW91dExpbWl0ID0gb3B0aW9ucy50aW1lb3V0TGltaXQ7XG4gICAgfVxuICAgIFNlcXVlbnRpYWxTdHJhdGVneS5wcm90b3R5cGUuaXNTdXBwb3J0ZWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBhbnkodGhpcy5zdHJhdGVnaWVzLCB1dGlsLm1ldGhvZCgnaXNTdXBwb3J0ZWQnKSk7XG4gICAgfTtcbiAgICBTZXF1ZW50aWFsU3RyYXRlZ3kucHJvdG90eXBlLmNvbm5lY3QgPSBmdW5jdGlvbiAobWluUHJpb3JpdHksIGNhbGxiYWNrKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIHZhciBzdHJhdGVnaWVzID0gdGhpcy5zdHJhdGVnaWVzO1xuICAgICAgICB2YXIgY3VycmVudCA9IDA7XG4gICAgICAgIHZhciB0aW1lb3V0ID0gdGhpcy50aW1lb3V0O1xuICAgICAgICB2YXIgcnVubmVyID0gbnVsbDtcbiAgICAgICAgdmFyIHRyeU5leHRTdHJhdGVneSA9IGZ1bmN0aW9uIChlcnJvciwgaGFuZHNoYWtlKSB7XG4gICAgICAgICAgICBpZiAoaGFuZHNoYWtlKSB7XG4gICAgICAgICAgICAgICAgY2FsbGJhY2sobnVsbCwgaGFuZHNoYWtlKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIGN1cnJlbnQgPSBjdXJyZW50ICsgMTtcbiAgICAgICAgICAgICAgICBpZiAoX3RoaXMubG9vcCkge1xuICAgICAgICAgICAgICAgICAgICBjdXJyZW50ID0gY3VycmVudCAlIHN0cmF0ZWdpZXMubGVuZ3RoO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBpZiAoY3VycmVudCA8IHN0cmF0ZWdpZXMubGVuZ3RoKSB7XG4gICAgICAgICAgICAgICAgICAgIGlmICh0aW1lb3V0KSB7XG4gICAgICAgICAgICAgICAgICAgICAgICB0aW1lb3V0ID0gdGltZW91dCAqIDI7XG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoX3RoaXMudGltZW91dExpbWl0KSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGltZW91dCA9IE1hdGgubWluKHRpbWVvdXQsIF90aGlzLnRpbWVvdXRMaW1pdCk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgcnVubmVyID0gX3RoaXMudHJ5U3RyYXRlZ3koc3RyYXRlZ2llc1tjdXJyZW50XSwgbWluUHJpb3JpdHksIHsgdGltZW91dDogdGltZW91dCwgZmFpbEZhc3Q6IF90aGlzLmZhaWxGYXN0IH0sIHRyeU5leHRTdHJhdGVneSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICBjYWxsYmFjayh0cnVlKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH07XG4gICAgICAgIHJ1bm5lciA9IHRoaXMudHJ5U3RyYXRlZ3koc3RyYXRlZ2llc1tjdXJyZW50XSwgbWluUHJpb3JpdHksIHsgdGltZW91dDogdGltZW91dCwgZmFpbEZhc3Q6IHRoaXMuZmFpbEZhc3QgfSwgdHJ5TmV4dFN0cmF0ZWd5KTtcbiAgICAgICAgcmV0dXJuIHtcbiAgICAgICAgICAgIGFib3J0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgcnVubmVyLmFib3J0KCk7XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgZm9yY2VNaW5Qcmlvcml0eTogZnVuY3Rpb24gKHApIHtcbiAgICAgICAgICAgICAgICBtaW5Qcmlvcml0eSA9IHA7XG4gICAgICAgICAgICAgICAgaWYgKHJ1bm5lcikge1xuICAgICAgICAgICAgICAgICAgICBydW5uZXIuZm9yY2VNaW5Qcmlvcml0eShwKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH07XG4gICAgfTtcbiAgICBTZXF1ZW50aWFsU3RyYXRlZ3kucHJvdG90eXBlLnRyeVN0cmF0ZWd5ID0gZnVuY3Rpb24gKHN0cmF0ZWd5LCBtaW5Qcmlvcml0eSwgb3B0aW9ucywgY2FsbGJhY2spIHtcbiAgICAgICAgdmFyIHRpbWVyID0gbnVsbDtcbiAgICAgICAgdmFyIHJ1bm5lciA9IG51bGw7XG4gICAgICAgIGlmIChvcHRpb25zLnRpbWVvdXQgPiAwKSB7XG4gICAgICAgICAgICB0aW1lciA9IG5ldyBPbmVPZmZUaW1lcihvcHRpb25zLnRpbWVvdXQsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBydW5uZXIuYWJvcnQoKTtcbiAgICAgICAgICAgICAgICBjYWxsYmFjayh0cnVlKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgICAgIHJ1bm5lciA9IHN0cmF0ZWd5LmNvbm5lY3QobWluUHJpb3JpdHksIGZ1bmN0aW9uIChlcnJvciwgaGFuZHNoYWtlKSB7XG4gICAgICAgICAgICBpZiAoZXJyb3IgJiYgdGltZXIgJiYgdGltZXIuaXNSdW5uaW5nKCkgJiYgIW9wdGlvbnMuZmFpbEZhc3QpIHtcbiAgICAgICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBpZiAodGltZXIpIHtcbiAgICAgICAgICAgICAgICB0aW1lci5lbnN1cmVBYm9ydGVkKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBjYWxsYmFjayhlcnJvciwgaGFuZHNoYWtlKTtcbiAgICAgICAgfSk7XG4gICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICBhYm9ydDogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIGlmICh0aW1lcikge1xuICAgICAgICAgICAgICAgICAgICB0aW1lci5lbnN1cmVBYm9ydGVkKCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIHJ1bm5lci5hYm9ydCgpO1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIGZvcmNlTWluUHJpb3JpdHk6IGZ1bmN0aW9uIChwKSB7XG4gICAgICAgICAgICAgICAgcnVubmVyLmZvcmNlTWluUHJpb3JpdHkocCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH07XG4gICAgfTtcbiAgICByZXR1cm4gU2VxdWVudGlhbFN0cmF0ZWd5O1xufSgpKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHNlcXVlbnRpYWxfc3RyYXRlZ3kgPSAoc2VxdWVudGlhbF9zdHJhdGVneV9TZXF1ZW50aWFsU3RyYXRlZ3kpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3N0cmF0ZWdpZXMvYmVzdF9jb25uZWN0ZWRfZXZlcl9zdHJhdGVneS50c1xuXG5cbnZhciBiZXN0X2Nvbm5lY3RlZF9ldmVyX3N0cmF0ZWd5X0Jlc3RDb25uZWN0ZWRFdmVyU3RyYXRlZ3kgPSAoZnVuY3Rpb24gKCkge1xuICAgIGZ1bmN0aW9uIEJlc3RDb25uZWN0ZWRFdmVyU3RyYXRlZ3koc3RyYXRlZ2llcykge1xuICAgICAgICB0aGlzLnN0cmF0ZWdpZXMgPSBzdHJhdGVnaWVzO1xuICAgIH1cbiAgICBCZXN0Q29ubmVjdGVkRXZlclN0cmF0ZWd5LnByb3RvdHlwZS5pc1N1cHBvcnRlZCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIGFueSh0aGlzLnN0cmF0ZWdpZXMsIHV0aWwubWV0aG9kKCdpc1N1cHBvcnRlZCcpKTtcbiAgICB9O1xuICAgIEJlc3RDb25uZWN0ZWRFdmVyU3RyYXRlZ3kucHJvdG90eXBlLmNvbm5lY3QgPSBmdW5jdGlvbiAobWluUHJpb3JpdHksIGNhbGxiYWNrKSB7XG4gICAgICAgIHJldHVybiBjb25uZWN0KHRoaXMuc3RyYXRlZ2llcywgbWluUHJpb3JpdHksIGZ1bmN0aW9uIChpLCBydW5uZXJzKSB7XG4gICAgICAgICAgICByZXR1cm4gZnVuY3Rpb24gKGVycm9yLCBoYW5kc2hha2UpIHtcbiAgICAgICAgICAgICAgICBydW5uZXJzW2ldLmVycm9yID0gZXJyb3I7XG4gICAgICAgICAgICAgICAgaWYgKGVycm9yKSB7XG4gICAgICAgICAgICAgICAgICAgIGlmIChhbGxSdW5uZXJzRmFpbGVkKHJ1bm5lcnMpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBjYWxsYmFjayh0cnVlKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGFwcGx5KHJ1bm5lcnMsIGZ1bmN0aW9uIChydW5uZXIpIHtcbiAgICAgICAgICAgICAgICAgICAgcnVubmVyLmZvcmNlTWluUHJpb3JpdHkoaGFuZHNoYWtlLnRyYW5zcG9ydC5wcmlvcml0eSk7XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgY2FsbGJhY2sobnVsbCwgaGFuZHNoYWtlKTtcbiAgICAgICAgICAgIH07XG4gICAgICAgIH0pO1xuICAgIH07XG4gICAgcmV0dXJuIEJlc3RDb25uZWN0ZWRFdmVyU3RyYXRlZ3k7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgYmVzdF9jb25uZWN0ZWRfZXZlcl9zdHJhdGVneSA9IChiZXN0X2Nvbm5lY3RlZF9ldmVyX3N0cmF0ZWd5X0Jlc3RDb25uZWN0ZWRFdmVyU3RyYXRlZ3kpO1xuZnVuY3Rpb24gY29ubmVjdChzdHJhdGVnaWVzLCBtaW5Qcmlvcml0eSwgY2FsbGJhY2tCdWlsZGVyKSB7XG4gICAgdmFyIHJ1bm5lcnMgPSBtYXAoc3RyYXRlZ2llcywgZnVuY3Rpb24gKHN0cmF0ZWd5LCBpLCBfLCBycykge1xuICAgICAgICByZXR1cm4gc3RyYXRlZ3kuY29ubmVjdChtaW5Qcmlvcml0eSwgY2FsbGJhY2tCdWlsZGVyKGksIHJzKSk7XG4gICAgfSk7XG4gICAgcmV0dXJuIHtcbiAgICAgICAgYWJvcnQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIGFwcGx5KHJ1bm5lcnMsIGFib3J0UnVubmVyKTtcbiAgICAgICAgfSxcbiAgICAgICAgZm9yY2VNaW5Qcmlvcml0eTogZnVuY3Rpb24gKHApIHtcbiAgICAgICAgICAgIGFwcGx5KHJ1bm5lcnMsIGZ1bmN0aW9uIChydW5uZXIpIHtcbiAgICAgICAgICAgICAgICBydW5uZXIuZm9yY2VNaW5Qcmlvcml0eShwKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfTtcbn1cbmZ1bmN0aW9uIGFsbFJ1bm5lcnNGYWlsZWQocnVubmVycykge1xuICAgIHJldHVybiBjb2xsZWN0aW9uc19hbGwocnVubmVycywgZnVuY3Rpb24gKHJ1bm5lcikge1xuICAgICAgICByZXR1cm4gQm9vbGVhbihydW5uZXIuZXJyb3IpO1xuICAgIH0pO1xufVxuZnVuY3Rpb24gYWJvcnRSdW5uZXIocnVubmVyKSB7XG4gICAgaWYgKCFydW5uZXIuZXJyb3IgJiYgIXJ1bm5lci5hYm9ydGVkKSB7XG4gICAgICAgIHJ1bm5lci5hYm9ydCgpO1xuICAgICAgICBydW5uZXIuYWJvcnRlZCA9IHRydWU7XG4gICAgfVxufVxuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3N0cmF0ZWdpZXMvY2FjaGVkX3N0cmF0ZWd5LnRzXG5cblxuXG5cbnZhciBjYWNoZWRfc3RyYXRlZ3lfQ2FjaGVkU3RyYXRlZ3kgPSAoZnVuY3Rpb24gKCkge1xuICAgIGZ1bmN0aW9uIENhY2hlZFN0cmF0ZWd5KHN0cmF0ZWd5LCB0cmFuc3BvcnRzLCBvcHRpb25zKSB7XG4gICAgICAgIHRoaXMuc3RyYXRlZ3kgPSBzdHJhdGVneTtcbiAgICAgICAgdGhpcy50cmFuc3BvcnRzID0gdHJhbnNwb3J0cztcbiAgICAgICAgdGhpcy50dGwgPSBvcHRpb25zLnR0bCB8fCAxODAwICogMTAwMDtcbiAgICAgICAgdGhpcy51c2luZ1RMUyA9IG9wdGlvbnMudXNlVExTO1xuICAgICAgICB0aGlzLnRpbWVsaW5lID0gb3B0aW9ucy50aW1lbGluZTtcbiAgICB9XG4gICAgQ2FjaGVkU3RyYXRlZ3kucHJvdG90eXBlLmlzU3VwcG9ydGVkID0gZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdGhpcy5zdHJhdGVneS5pc1N1cHBvcnRlZCgpO1xuICAgIH07XG4gICAgQ2FjaGVkU3RyYXRlZ3kucHJvdG90eXBlLmNvbm5lY3QgPSBmdW5jdGlvbiAobWluUHJpb3JpdHksIGNhbGxiYWNrKSB7XG4gICAgICAgIHZhciB1c2luZ1RMUyA9IHRoaXMudXNpbmdUTFM7XG4gICAgICAgIHZhciBpbmZvID0gZmV0Y2hUcmFuc3BvcnRDYWNoZSh1c2luZ1RMUyk7XG4gICAgICAgIHZhciBzdHJhdGVnaWVzID0gW3RoaXMuc3RyYXRlZ3ldO1xuICAgICAgICBpZiAoaW5mbyAmJiBpbmZvLnRpbWVzdGFtcCArIHRoaXMudHRsID49IHV0aWwubm93KCkpIHtcbiAgICAgICAgICAgIHZhciB0cmFuc3BvcnQgPSB0aGlzLnRyYW5zcG9ydHNbaW5mby50cmFuc3BvcnRdO1xuICAgICAgICAgICAgaWYgKHRyYW5zcG9ydCkge1xuICAgICAgICAgICAgICAgIHRoaXMudGltZWxpbmUuaW5mbyh7XG4gICAgICAgICAgICAgICAgICAgIGNhY2hlZDogdHJ1ZSxcbiAgICAgICAgICAgICAgICAgICAgdHJhbnNwb3J0OiBpbmZvLnRyYW5zcG9ydCxcbiAgICAgICAgICAgICAgICAgICAgbGF0ZW5jeTogaW5mby5sYXRlbmN5XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgc3RyYXRlZ2llcy5wdXNoKG5ldyBzZXF1ZW50aWFsX3N0cmF0ZWd5KFt0cmFuc3BvcnRdLCB7XG4gICAgICAgICAgICAgICAgICAgIHRpbWVvdXQ6IGluZm8ubGF0ZW5jeSAqIDIgKyAxMDAwLFxuICAgICAgICAgICAgICAgICAgICBmYWlsRmFzdDogdHJ1ZVxuICAgICAgICAgICAgICAgIH0pKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgICB2YXIgc3RhcnRUaW1lc3RhbXAgPSB1dGlsLm5vdygpO1xuICAgICAgICB2YXIgcnVubmVyID0gc3RyYXRlZ2llc1xuICAgICAgICAgICAgLnBvcCgpXG4gICAgICAgICAgICAuY29ubmVjdChtaW5Qcmlvcml0eSwgZnVuY3Rpb24gY2IoZXJyb3IsIGhhbmRzaGFrZSkge1xuICAgICAgICAgICAgaWYgKGVycm9yKSB7XG4gICAgICAgICAgICAgICAgZmx1c2hUcmFuc3BvcnRDYWNoZSh1c2luZ1RMUyk7XG4gICAgICAgICAgICAgICAgaWYgKHN0cmF0ZWdpZXMubGVuZ3RoID4gMCkge1xuICAgICAgICAgICAgICAgICAgICBzdGFydFRpbWVzdGFtcCA9IHV0aWwubm93KCk7XG4gICAgICAgICAgICAgICAgICAgIHJ1bm5lciA9IHN0cmF0ZWdpZXMucG9wKCkuY29ubmVjdChtaW5Qcmlvcml0eSwgY2IpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgY2FsbGJhY2soZXJyb3IpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIHN0b3JlVHJhbnNwb3J0Q2FjaGUodXNpbmdUTFMsIGhhbmRzaGFrZS50cmFuc3BvcnQubmFtZSwgdXRpbC5ub3coKSAtIHN0YXJ0VGltZXN0YW1wKTtcbiAgICAgICAgICAgICAgICBjYWxsYmFjayhudWxsLCBoYW5kc2hha2UpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICAgICAgcmV0dXJuIHtcbiAgICAgICAgICAgIGFib3J0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgcnVubmVyLmFib3J0KCk7XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgZm9yY2VNaW5Qcmlvcml0eTogZnVuY3Rpb24gKHApIHtcbiAgICAgICAgICAgICAgICBtaW5Qcmlvcml0eSA9IHA7XG4gICAgICAgICAgICAgICAgaWYgKHJ1bm5lcikge1xuICAgICAgICAgICAgICAgICAgICBydW5uZXIuZm9yY2VNaW5Qcmlvcml0eShwKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH07XG4gICAgfTtcbiAgICByZXR1cm4gQ2FjaGVkU3RyYXRlZ3k7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgY2FjaGVkX3N0cmF0ZWd5ID0gKGNhY2hlZF9zdHJhdGVneV9DYWNoZWRTdHJhdGVneSk7XG5mdW5jdGlvbiBnZXRUcmFuc3BvcnRDYWNoZUtleSh1c2luZ1RMUykge1xuICAgIHJldHVybiAncHVzaGVyVHJhbnNwb3J0JyArICh1c2luZ1RMUyA/ICdUTFMnIDogJ05vblRMUycpO1xufVxuZnVuY3Rpb24gZmV0Y2hUcmFuc3BvcnRDYWNoZSh1c2luZ1RMUykge1xuICAgIHZhciBzdG9yYWdlID0gcnVudGltZS5nZXRMb2NhbFN0b3JhZ2UoKTtcbiAgICBpZiAoc3RvcmFnZSkge1xuICAgICAgICB0cnkge1xuICAgICAgICAgICAgdmFyIHNlcmlhbGl6ZWRDYWNoZSA9IHN0b3JhZ2VbZ2V0VHJhbnNwb3J0Q2FjaGVLZXkodXNpbmdUTFMpXTtcbiAgICAgICAgICAgIGlmIChzZXJpYWxpemVkQ2FjaGUpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gSlNPTi5wYXJzZShzZXJpYWxpemVkQ2FjaGUpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICAgIGNhdGNoIChlKSB7XG4gICAgICAgICAgICBmbHVzaFRyYW5zcG9ydENhY2hlKHVzaW5nVExTKTtcbiAgICAgICAgfVxuICAgIH1cbiAgICByZXR1cm4gbnVsbDtcbn1cbmZ1bmN0aW9uIHN0b3JlVHJhbnNwb3J0Q2FjaGUodXNpbmdUTFMsIHRyYW5zcG9ydCwgbGF0ZW5jeSkge1xuICAgIHZhciBzdG9yYWdlID0gcnVudGltZS5nZXRMb2NhbFN0b3JhZ2UoKTtcbiAgICBpZiAoc3RvcmFnZSkge1xuICAgICAgICB0cnkge1xuICAgICAgICAgICAgc3RvcmFnZVtnZXRUcmFuc3BvcnRDYWNoZUtleSh1c2luZ1RMUyldID0gc2FmZUpTT05TdHJpbmdpZnkoe1xuICAgICAgICAgICAgICAgIHRpbWVzdGFtcDogdXRpbC5ub3coKSxcbiAgICAgICAgICAgICAgICB0cmFuc3BvcnQ6IHRyYW5zcG9ydCxcbiAgICAgICAgICAgICAgICBsYXRlbmN5OiBsYXRlbmN5XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgICAgICBjYXRjaCAoZSkge1xuICAgICAgICB9XG4gICAgfVxufVxuZnVuY3Rpb24gZmx1c2hUcmFuc3BvcnRDYWNoZSh1c2luZ1RMUykge1xuICAgIHZhciBzdG9yYWdlID0gcnVudGltZS5nZXRMb2NhbFN0b3JhZ2UoKTtcbiAgICBpZiAoc3RvcmFnZSkge1xuICAgICAgICB0cnkge1xuICAgICAgICAgICAgZGVsZXRlIHN0b3JhZ2VbZ2V0VHJhbnNwb3J0Q2FjaGVLZXkodXNpbmdUTFMpXTtcbiAgICAgICAgfVxuICAgICAgICBjYXRjaCAoZSkge1xuICAgICAgICB9XG4gICAgfVxufVxuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3N0cmF0ZWdpZXMvZGVsYXllZF9zdHJhdGVneS50c1xuXG52YXIgZGVsYXllZF9zdHJhdGVneV9EZWxheWVkU3RyYXRlZ3kgPSAoZnVuY3Rpb24gKCkge1xuICAgIGZ1bmN0aW9uIERlbGF5ZWRTdHJhdGVneShzdHJhdGVneSwgX2EpIHtcbiAgICAgICAgdmFyIG51bWJlciA9IF9hLmRlbGF5O1xuICAgICAgICB0aGlzLnN0cmF0ZWd5ID0gc3RyYXRlZ3k7XG4gICAgICAgIHRoaXMub3B0aW9ucyA9IHsgZGVsYXk6IG51bWJlciB9O1xuICAgIH1cbiAgICBEZWxheWVkU3RyYXRlZ3kucHJvdG90eXBlLmlzU3VwcG9ydGVkID0gZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdGhpcy5zdHJhdGVneS5pc1N1cHBvcnRlZCgpO1xuICAgIH07XG4gICAgRGVsYXllZFN0cmF0ZWd5LnByb3RvdHlwZS5jb25uZWN0ID0gZnVuY3Rpb24gKG1pblByaW9yaXR5LCBjYWxsYmFjaykge1xuICAgICAgICB2YXIgc3RyYXRlZ3kgPSB0aGlzLnN0cmF0ZWd5O1xuICAgICAgICB2YXIgcnVubmVyO1xuICAgICAgICB2YXIgdGltZXIgPSBuZXcgT25lT2ZmVGltZXIodGhpcy5vcHRpb25zLmRlbGF5LCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBydW5uZXIgPSBzdHJhdGVneS5jb25uZWN0KG1pblByaW9yaXR5LCBjYWxsYmFjayk7XG4gICAgICAgIH0pO1xuICAgICAgICByZXR1cm4ge1xuICAgICAgICAgICAgYWJvcnQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICB0aW1lci5lbnN1cmVBYm9ydGVkKCk7XG4gICAgICAgICAgICAgICAgaWYgKHJ1bm5lcikge1xuICAgICAgICAgICAgICAgICAgICBydW5uZXIuYWJvcnQoKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgZm9yY2VNaW5Qcmlvcml0eTogZnVuY3Rpb24gKHApIHtcbiAgICAgICAgICAgICAgICBtaW5Qcmlvcml0eSA9IHA7XG4gICAgICAgICAgICAgICAgaWYgKHJ1bm5lcikge1xuICAgICAgICAgICAgICAgICAgICBydW5uZXIuZm9yY2VNaW5Qcmlvcml0eShwKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH07XG4gICAgfTtcbiAgICByZXR1cm4gRGVsYXllZFN0cmF0ZWd5O1xufSgpKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIGRlbGF5ZWRfc3RyYXRlZ3kgPSAoZGVsYXllZF9zdHJhdGVneV9EZWxheWVkU3RyYXRlZ3kpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3N0cmF0ZWdpZXMvaWZfc3RyYXRlZ3kudHNcbnZhciBJZlN0cmF0ZWd5ID0gKGZ1bmN0aW9uICgpIHtcbiAgICBmdW5jdGlvbiBJZlN0cmF0ZWd5KHRlc3QsIHRydWVCcmFuY2gsIGZhbHNlQnJhbmNoKSB7XG4gICAgICAgIHRoaXMudGVzdCA9IHRlc3Q7XG4gICAgICAgIHRoaXMudHJ1ZUJyYW5jaCA9IHRydWVCcmFuY2g7XG4gICAgICAgIHRoaXMuZmFsc2VCcmFuY2ggPSBmYWxzZUJyYW5jaDtcbiAgICB9XG4gICAgSWZTdHJhdGVneS5wcm90b3R5cGUuaXNTdXBwb3J0ZWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBicmFuY2ggPSB0aGlzLnRlc3QoKSA/IHRoaXMudHJ1ZUJyYW5jaCA6IHRoaXMuZmFsc2VCcmFuY2g7XG4gICAgICAgIHJldHVybiBicmFuY2guaXNTdXBwb3J0ZWQoKTtcbiAgICB9O1xuICAgIElmU3RyYXRlZ3kucHJvdG90eXBlLmNvbm5lY3QgPSBmdW5jdGlvbiAobWluUHJpb3JpdHksIGNhbGxiYWNrKSB7XG4gICAgICAgIHZhciBicmFuY2ggPSB0aGlzLnRlc3QoKSA/IHRoaXMudHJ1ZUJyYW5jaCA6IHRoaXMuZmFsc2VCcmFuY2g7XG4gICAgICAgIHJldHVybiBicmFuY2guY29ubmVjdChtaW5Qcmlvcml0eSwgY2FsbGJhY2spO1xuICAgIH07XG4gICAgcmV0dXJuIElmU3RyYXRlZ3k7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgaWZfc3RyYXRlZ3kgPSAoSWZTdHJhdGVneSk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvc3RyYXRlZ2llcy9maXJzdF9jb25uZWN0ZWRfc3RyYXRlZ3kudHNcbnZhciBGaXJzdENvbm5lY3RlZFN0cmF0ZWd5ID0gKGZ1bmN0aW9uICgpIHtcbiAgICBmdW5jdGlvbiBGaXJzdENvbm5lY3RlZFN0cmF0ZWd5KHN0cmF0ZWd5KSB7XG4gICAgICAgIHRoaXMuc3RyYXRlZ3kgPSBzdHJhdGVneTtcbiAgICB9XG4gICAgRmlyc3RDb25uZWN0ZWRTdHJhdGVneS5wcm90b3R5cGUuaXNTdXBwb3J0ZWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiB0aGlzLnN0cmF0ZWd5LmlzU3VwcG9ydGVkKCk7XG4gICAgfTtcbiAgICBGaXJzdENvbm5lY3RlZFN0cmF0ZWd5LnByb3RvdHlwZS5jb25uZWN0ID0gZnVuY3Rpb24gKG1pblByaW9yaXR5LCBjYWxsYmFjaykge1xuICAgICAgICB2YXIgcnVubmVyID0gdGhpcy5zdHJhdGVneS5jb25uZWN0KG1pblByaW9yaXR5LCBmdW5jdGlvbiAoZXJyb3IsIGhhbmRzaGFrZSkge1xuICAgICAgICAgICAgaWYgKGhhbmRzaGFrZSkge1xuICAgICAgICAgICAgICAgIHJ1bm5lci5hYm9ydCgpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgY2FsbGJhY2soZXJyb3IsIGhhbmRzaGFrZSk7XG4gICAgICAgIH0pO1xuICAgICAgICByZXR1cm4gcnVubmVyO1xuICAgIH07XG4gICAgcmV0dXJuIEZpcnN0Q29ubmVjdGVkU3RyYXRlZ3k7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgZmlyc3RfY29ubmVjdGVkX3N0cmF0ZWd5ID0gKEZpcnN0Q29ubmVjdGVkU3RyYXRlZ3kpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9ydW50aW1lcy93ZWIvZGVmYXVsdF9zdHJhdGVneS50c1xuXG5cblxuXG5cblxuXG5mdW5jdGlvbiB0ZXN0U3VwcG9ydHNTdHJhdGVneShzdHJhdGVneSkge1xuICAgIHJldHVybiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBzdHJhdGVneS5pc1N1cHBvcnRlZCgpO1xuICAgIH07XG59XG52YXIgZ2V0RGVmYXVsdFN0cmF0ZWd5ID0gZnVuY3Rpb24gKGNvbmZpZywgYmFzZU9wdGlvbnMsIGRlZmluZVRyYW5zcG9ydCkge1xuICAgIHZhciBkZWZpbmVkVHJhbnNwb3J0cyA9IHt9O1xuICAgIGZ1bmN0aW9uIGRlZmluZVRyYW5zcG9ydFN0cmF0ZWd5KG5hbWUsIHR5cGUsIHByaW9yaXR5LCBvcHRpb25zLCBtYW5hZ2VyKSB7XG4gICAgICAgIHZhciB0cmFuc3BvcnQgPSBkZWZpbmVUcmFuc3BvcnQoY29uZmlnLCBuYW1lLCB0eXBlLCBwcmlvcml0eSwgb3B0aW9ucywgbWFuYWdlcik7XG4gICAgICAgIGRlZmluZWRUcmFuc3BvcnRzW25hbWVdID0gdHJhbnNwb3J0O1xuICAgICAgICByZXR1cm4gdHJhbnNwb3J0O1xuICAgIH1cbiAgICB2YXIgd3Nfb3B0aW9ucyA9IE9iamVjdC5hc3NpZ24oe30sIGJhc2VPcHRpb25zLCB7XG4gICAgICAgIGhvc3ROb25UTFM6IGNvbmZpZy53c0hvc3QgKyAnOicgKyBjb25maWcud3NQb3J0LFxuICAgICAgICBob3N0VExTOiBjb25maWcud3NIb3N0ICsgJzonICsgY29uZmlnLndzc1BvcnQsXG4gICAgICAgIGh0dHBQYXRoOiBjb25maWcud3NQYXRoXG4gICAgfSk7XG4gICAgdmFyIHdzc19vcHRpb25zID0gT2JqZWN0LmFzc2lnbih7fSwgd3Nfb3B0aW9ucywge1xuICAgICAgICB1c2VUTFM6IHRydWVcbiAgICB9KTtcbiAgICB2YXIgc29ja2pzX29wdGlvbnMgPSBPYmplY3QuYXNzaWduKHt9LCBiYXNlT3B0aW9ucywge1xuICAgICAgICBob3N0Tm9uVExTOiBjb25maWcuaHR0cEhvc3QgKyAnOicgKyBjb25maWcuaHR0cFBvcnQsXG4gICAgICAgIGhvc3RUTFM6IGNvbmZpZy5odHRwSG9zdCArICc6JyArIGNvbmZpZy5odHRwc1BvcnQsXG4gICAgICAgIGh0dHBQYXRoOiBjb25maWcuaHR0cFBhdGhcbiAgICB9KTtcbiAgICB2YXIgdGltZW91dHMgPSB7XG4gICAgICAgIGxvb3A6IHRydWUsXG4gICAgICAgIHRpbWVvdXQ6IDE1MDAwLFxuICAgICAgICB0aW1lb3V0TGltaXQ6IDYwMDAwXG4gICAgfTtcbiAgICB2YXIgd3NfbWFuYWdlciA9IG5ldyB0cmFuc3BvcnRfbWFuYWdlcih7XG4gICAgICAgIGxpdmVzOiAyLFxuICAgICAgICBtaW5QaW5nRGVsYXk6IDEwMDAwLFxuICAgICAgICBtYXhQaW5nRGVsYXk6IGNvbmZpZy5hY3Rpdml0eVRpbWVvdXRcbiAgICB9KTtcbiAgICB2YXIgc3RyZWFtaW5nX21hbmFnZXIgPSBuZXcgdHJhbnNwb3J0X21hbmFnZXIoe1xuICAgICAgICBsaXZlczogMixcbiAgICAgICAgbWluUGluZ0RlbGF5OiAxMDAwMCxcbiAgICAgICAgbWF4UGluZ0RlbGF5OiBjb25maWcuYWN0aXZpdHlUaW1lb3V0XG4gICAgfSk7XG4gICAgdmFyIHdzX3RyYW5zcG9ydCA9IGRlZmluZVRyYW5zcG9ydFN0cmF0ZWd5KCd3cycsICd3cycsIDMsIHdzX29wdGlvbnMsIHdzX21hbmFnZXIpO1xuICAgIHZhciB3c3NfdHJhbnNwb3J0ID0gZGVmaW5lVHJhbnNwb3J0U3RyYXRlZ3koJ3dzcycsICd3cycsIDMsIHdzc19vcHRpb25zLCB3c19tYW5hZ2VyKTtcbiAgICB2YXIgc29ja2pzX3RyYW5zcG9ydCA9IGRlZmluZVRyYW5zcG9ydFN0cmF0ZWd5KCdzb2NranMnLCAnc29ja2pzJywgMSwgc29ja2pzX29wdGlvbnMpO1xuICAgIHZhciB4aHJfc3RyZWFtaW5nX3RyYW5zcG9ydCA9IGRlZmluZVRyYW5zcG9ydFN0cmF0ZWd5KCd4aHJfc3RyZWFtaW5nJywgJ3hocl9zdHJlYW1pbmcnLCAxLCBzb2NranNfb3B0aW9ucywgc3RyZWFtaW5nX21hbmFnZXIpO1xuICAgIHZhciB4ZHJfc3RyZWFtaW5nX3RyYW5zcG9ydCA9IGRlZmluZVRyYW5zcG9ydFN0cmF0ZWd5KCd4ZHJfc3RyZWFtaW5nJywgJ3hkcl9zdHJlYW1pbmcnLCAxLCBzb2NranNfb3B0aW9ucywgc3RyZWFtaW5nX21hbmFnZXIpO1xuICAgIHZhciB4aHJfcG9sbGluZ190cmFuc3BvcnQgPSBkZWZpbmVUcmFuc3BvcnRTdHJhdGVneSgneGhyX3BvbGxpbmcnLCAneGhyX3BvbGxpbmcnLCAxLCBzb2NranNfb3B0aW9ucyk7XG4gICAgdmFyIHhkcl9wb2xsaW5nX3RyYW5zcG9ydCA9IGRlZmluZVRyYW5zcG9ydFN0cmF0ZWd5KCd4ZHJfcG9sbGluZycsICd4ZHJfcG9sbGluZycsIDEsIHNvY2tqc19vcHRpb25zKTtcbiAgICB2YXIgd3NfbG9vcCA9IG5ldyBzZXF1ZW50aWFsX3N0cmF0ZWd5KFt3c190cmFuc3BvcnRdLCB0aW1lb3V0cyk7XG4gICAgdmFyIHdzc19sb29wID0gbmV3IHNlcXVlbnRpYWxfc3RyYXRlZ3koW3dzc190cmFuc3BvcnRdLCB0aW1lb3V0cyk7XG4gICAgdmFyIHNvY2tqc19sb29wID0gbmV3IHNlcXVlbnRpYWxfc3RyYXRlZ3koW3NvY2tqc190cmFuc3BvcnRdLCB0aW1lb3V0cyk7XG4gICAgdmFyIHN0cmVhbWluZ19sb29wID0gbmV3IHNlcXVlbnRpYWxfc3RyYXRlZ3koW1xuICAgICAgICBuZXcgaWZfc3RyYXRlZ3kodGVzdFN1cHBvcnRzU3RyYXRlZ3koeGhyX3N0cmVhbWluZ190cmFuc3BvcnQpLCB4aHJfc3RyZWFtaW5nX3RyYW5zcG9ydCwgeGRyX3N0cmVhbWluZ190cmFuc3BvcnQpXG4gICAgXSwgdGltZW91dHMpO1xuICAgIHZhciBwb2xsaW5nX2xvb3AgPSBuZXcgc2VxdWVudGlhbF9zdHJhdGVneShbXG4gICAgICAgIG5ldyBpZl9zdHJhdGVneSh0ZXN0U3VwcG9ydHNTdHJhdGVneSh4aHJfcG9sbGluZ190cmFuc3BvcnQpLCB4aHJfcG9sbGluZ190cmFuc3BvcnQsIHhkcl9wb2xsaW5nX3RyYW5zcG9ydClcbiAgICBdLCB0aW1lb3V0cyk7XG4gICAgdmFyIGh0dHBfbG9vcCA9IG5ldyBzZXF1ZW50aWFsX3N0cmF0ZWd5KFtcbiAgICAgICAgbmV3IGlmX3N0cmF0ZWd5KHRlc3RTdXBwb3J0c1N0cmF0ZWd5KHN0cmVhbWluZ19sb29wKSwgbmV3IGJlc3RfY29ubmVjdGVkX2V2ZXJfc3RyYXRlZ3koW1xuICAgICAgICAgICAgc3RyZWFtaW5nX2xvb3AsXG4gICAgICAgICAgICBuZXcgZGVsYXllZF9zdHJhdGVneShwb2xsaW5nX2xvb3AsIHsgZGVsYXk6IDQwMDAgfSlcbiAgICAgICAgXSksIHBvbGxpbmdfbG9vcClcbiAgICBdLCB0aW1lb3V0cyk7XG4gICAgdmFyIGh0dHBfZmFsbGJhY2tfbG9vcCA9IG5ldyBpZl9zdHJhdGVneSh0ZXN0U3VwcG9ydHNTdHJhdGVneShodHRwX2xvb3ApLCBodHRwX2xvb3AsIHNvY2tqc19sb29wKTtcbiAgICB2YXIgd3NTdHJhdGVneTtcbiAgICBpZiAoYmFzZU9wdGlvbnMudXNlVExTKSB7XG4gICAgICAgIHdzU3RyYXRlZ3kgPSBuZXcgYmVzdF9jb25uZWN0ZWRfZXZlcl9zdHJhdGVneShbXG4gICAgICAgICAgICB3c19sb29wLFxuICAgICAgICAgICAgbmV3IGRlbGF5ZWRfc3RyYXRlZ3koaHR0cF9mYWxsYmFja19sb29wLCB7IGRlbGF5OiAyMDAwIH0pXG4gICAgICAgIF0pO1xuICAgIH1cbiAgICBlbHNlIHtcbiAgICAgICAgd3NTdHJhdGVneSA9IG5ldyBiZXN0X2Nvbm5lY3RlZF9ldmVyX3N0cmF0ZWd5KFtcbiAgICAgICAgICAgIHdzX2xvb3AsXG4gICAgICAgICAgICBuZXcgZGVsYXllZF9zdHJhdGVneSh3c3NfbG9vcCwgeyBkZWxheTogMjAwMCB9KSxcbiAgICAgICAgICAgIG5ldyBkZWxheWVkX3N0cmF0ZWd5KGh0dHBfZmFsbGJhY2tfbG9vcCwgeyBkZWxheTogNTAwMCB9KVxuICAgICAgICBdKTtcbiAgICB9XG4gICAgcmV0dXJuIG5ldyBjYWNoZWRfc3RyYXRlZ3kobmV3IGZpcnN0X2Nvbm5lY3RlZF9zdHJhdGVneShuZXcgaWZfc3RyYXRlZ3kodGVzdFN1cHBvcnRzU3RyYXRlZ3kod3NfdHJhbnNwb3J0KSwgd3NTdHJhdGVneSwgaHR0cF9mYWxsYmFja19sb29wKSksIGRlZmluZWRUcmFuc3BvcnRzLCB7XG4gICAgICAgIHR0bDogMTgwMDAwMCxcbiAgICAgICAgdGltZWxpbmU6IGJhc2VPcHRpb25zLnRpbWVsaW5lLFxuICAgICAgICB1c2VUTFM6IGJhc2VPcHRpb25zLnVzZVRMU1xuICAgIH0pO1xufTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIGRlZmF1bHRfc3RyYXRlZ3kgPSAoZ2V0RGVmYXVsdFN0cmF0ZWd5KTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvcnVudGltZXMvd2ViL3RyYW5zcG9ydHMvdHJhbnNwb3J0X2Nvbm5lY3Rpb25faW5pdGlhbGl6ZXIudHNcblxuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgdHJhbnNwb3J0X2Nvbm5lY3Rpb25faW5pdGlhbGl6ZXIgPSAoZnVuY3Rpb24gKCkge1xuICAgIHZhciBzZWxmID0gdGhpcztcbiAgICBzZWxmLnRpbWVsaW5lLmluZm8oc2VsZi5idWlsZFRpbWVsaW5lTWVzc2FnZSh7XG4gICAgICAgIHRyYW5zcG9ydDogc2VsZi5uYW1lICsgKHNlbGYub3B0aW9ucy51c2VUTFMgPyAncycgOiAnJylcbiAgICB9KSk7XG4gICAgaWYgKHNlbGYuaG9va3MuaXNJbml0aWFsaXplZCgpKSB7XG4gICAgICAgIHNlbGYuY2hhbmdlU3RhdGUoJ2luaXRpYWxpemVkJyk7XG4gICAgfVxuICAgIGVsc2UgaWYgKHNlbGYuaG9va3MuZmlsZSkge1xuICAgICAgICBzZWxmLmNoYW5nZVN0YXRlKCdpbml0aWFsaXppbmcnKTtcbiAgICAgICAgRGVwZW5kZW5jaWVzLmxvYWQoc2VsZi5ob29rcy5maWxlLCB7IHVzZVRMUzogc2VsZi5vcHRpb25zLnVzZVRMUyB9LCBmdW5jdGlvbiAoZXJyb3IsIGNhbGxiYWNrKSB7XG4gICAgICAgICAgICBpZiAoc2VsZi5ob29rcy5pc0luaXRpYWxpemVkKCkpIHtcbiAgICAgICAgICAgICAgICBzZWxmLmNoYW5nZVN0YXRlKCdpbml0aWFsaXplZCcpO1xuICAgICAgICAgICAgICAgIGNhbGxiYWNrKHRydWUpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgaWYgKGVycm9yKSB7XG4gICAgICAgICAgICAgICAgICAgIHNlbGYub25FcnJvcihlcnJvcik7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIHNlbGYub25DbG9zZSgpO1xuICAgICAgICAgICAgICAgIGNhbGxiYWNrKGZhbHNlKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgfVxuICAgIGVsc2Uge1xuICAgICAgICBzZWxmLm9uQ2xvc2UoKTtcbiAgICB9XG59KTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvcnVudGltZXMvd2ViL2h0dHAvaHR0cF94ZG9tYWluX3JlcXVlc3QudHNcblxudmFyIGh0dHBfeGRvbWFpbl9yZXF1ZXN0X2hvb2tzID0ge1xuICAgIGdldFJlcXVlc3Q6IGZ1bmN0aW9uIChzb2NrZXQpIHtcbiAgICAgICAgdmFyIHhkciA9IG5ldyB3aW5kb3cuWERvbWFpblJlcXVlc3QoKTtcbiAgICAgICAgeGRyLm9udGltZW91dCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIHNvY2tldC5lbWl0KCdlcnJvcicsIG5ldyBSZXF1ZXN0VGltZWRPdXQoKSk7XG4gICAgICAgICAgICBzb2NrZXQuY2xvc2UoKTtcbiAgICAgICAgfTtcbiAgICAgICAgeGRyLm9uZXJyb3IgPSBmdW5jdGlvbiAoZSkge1xuICAgICAgICAgICAgc29ja2V0LmVtaXQoJ2Vycm9yJywgZSk7XG4gICAgICAgICAgICBzb2NrZXQuY2xvc2UoKTtcbiAgICAgICAgfTtcbiAgICAgICAgeGRyLm9ucHJvZ3Jlc3MgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBpZiAoeGRyLnJlc3BvbnNlVGV4dCAmJiB4ZHIucmVzcG9uc2VUZXh0Lmxlbmd0aCA+IDApIHtcbiAgICAgICAgICAgICAgICBzb2NrZXQub25DaHVuaygyMDAsIHhkci5yZXNwb25zZVRleHQpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9O1xuICAgICAgICB4ZHIub25sb2FkID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgaWYgKHhkci5yZXNwb25zZVRleHQgJiYgeGRyLnJlc3BvbnNlVGV4dC5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICAgICAgc29ja2V0Lm9uQ2h1bmsoMjAwLCB4ZHIucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIHNvY2tldC5lbWl0KCdmaW5pc2hlZCcsIDIwMCk7XG4gICAgICAgICAgICBzb2NrZXQuY2xvc2UoKTtcbiAgICAgICAgfTtcbiAgICAgICAgcmV0dXJuIHhkcjtcbiAgICB9LFxuICAgIGFib3J0UmVxdWVzdDogZnVuY3Rpb24gKHhkcikge1xuICAgICAgICB4ZHIub250aW1lb3V0ID0geGRyLm9uZXJyb3IgPSB4ZHIub25wcm9ncmVzcyA9IHhkci5vbmxvYWQgPSBudWxsO1xuICAgICAgICB4ZHIuYWJvcnQoKTtcbiAgICB9XG59O1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgaHR0cF94ZG9tYWluX3JlcXVlc3QgPSAoaHR0cF94ZG9tYWluX3JlcXVlc3RfaG9va3MpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL2h0dHAvaHR0cF9yZXF1ZXN0LnRzXG52YXIgaHR0cF9yZXF1ZXN0X2V4dGVuZHMgPSAodW5kZWZpbmVkICYmIHVuZGVmaW5lZC5fX2V4dGVuZHMpIHx8IChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIGV4dGVuZFN0YXRpY3MgPSBmdW5jdGlvbiAoZCwgYikge1xuICAgICAgICBleHRlbmRTdGF0aWNzID0gT2JqZWN0LnNldFByb3RvdHlwZU9mIHx8XG4gICAgICAgICAgICAoeyBfX3Byb3RvX186IFtdIH0gaW5zdGFuY2VvZiBBcnJheSAmJiBmdW5jdGlvbiAoZCwgYikgeyBkLl9fcHJvdG9fXyA9IGI7IH0pIHx8XG4gICAgICAgICAgICBmdW5jdGlvbiAoZCwgYikgeyBmb3IgKHZhciBwIGluIGIpIGlmIChiLmhhc093blByb3BlcnR5KHApKSBkW3BdID0gYltwXTsgfTtcbiAgICAgICAgcmV0dXJuIGV4dGVuZFN0YXRpY3MoZCwgYik7XG4gICAgfTtcbiAgICByZXR1cm4gZnVuY3Rpb24gKGQsIGIpIHtcbiAgICAgICAgZXh0ZW5kU3RhdGljcyhkLCBiKTtcbiAgICAgICAgZnVuY3Rpb24gX18oKSB7IHRoaXMuY29uc3RydWN0b3IgPSBkOyB9XG4gICAgICAgIGQucHJvdG90eXBlID0gYiA9PT0gbnVsbCA/IE9iamVjdC5jcmVhdGUoYikgOiAoX18ucHJvdG90eXBlID0gYi5wcm90b3R5cGUsIG5ldyBfXygpKTtcbiAgICB9O1xufSkoKTtcblxuXG52YXIgTUFYX0JVRkZFUl9MRU5HVEggPSAyNTYgKiAxMDI0O1xudmFyIGh0dHBfcmVxdWVzdF9IVFRQUmVxdWVzdCA9IChmdW5jdGlvbiAoX3N1cGVyKSB7XG4gICAgaHR0cF9yZXF1ZXN0X2V4dGVuZHMoSFRUUFJlcXVlc3QsIF9zdXBlcik7XG4gICAgZnVuY3Rpb24gSFRUUFJlcXVlc3QoaG9va3MsIG1ldGhvZCwgdXJsKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IF9zdXBlci5jYWxsKHRoaXMpIHx8IHRoaXM7XG4gICAgICAgIF90aGlzLmhvb2tzID0gaG9va3M7XG4gICAgICAgIF90aGlzLm1ldGhvZCA9IG1ldGhvZDtcbiAgICAgICAgX3RoaXMudXJsID0gdXJsO1xuICAgICAgICByZXR1cm4gX3RoaXM7XG4gICAgfVxuICAgIEhUVFBSZXF1ZXN0LnByb3RvdHlwZS5zdGFydCA9IGZ1bmN0aW9uIChwYXlsb2FkKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIHRoaXMucG9zaXRpb24gPSAwO1xuICAgICAgICB0aGlzLnhociA9IHRoaXMuaG9va3MuZ2V0UmVxdWVzdCh0aGlzKTtcbiAgICAgICAgdGhpcy51bmxvYWRlciA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIF90aGlzLmNsb3NlKCk7XG4gICAgICAgIH07XG4gICAgICAgIHJ1bnRpbWUuYWRkVW5sb2FkTGlzdGVuZXIodGhpcy51bmxvYWRlcik7XG4gICAgICAgIHRoaXMueGhyLm9wZW4odGhpcy5tZXRob2QsIHRoaXMudXJsLCB0cnVlKTtcbiAgICAgICAgaWYgKHRoaXMueGhyLnNldFJlcXVlc3RIZWFkZXIpIHtcbiAgICAgICAgICAgIHRoaXMueGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi9qc29uJyk7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy54aHIuc2VuZChwYXlsb2FkKTtcbiAgICB9O1xuICAgIEhUVFBSZXF1ZXN0LnByb3RvdHlwZS5jbG9zZSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMudW5sb2FkZXIpIHtcbiAgICAgICAgICAgIHJ1bnRpbWUucmVtb3ZlVW5sb2FkTGlzdGVuZXIodGhpcy51bmxvYWRlcik7XG4gICAgICAgICAgICB0aGlzLnVubG9hZGVyID0gbnVsbDtcbiAgICAgICAgfVxuICAgICAgICBpZiAodGhpcy54aHIpIHtcbiAgICAgICAgICAgIHRoaXMuaG9va3MuYWJvcnRSZXF1ZXN0KHRoaXMueGhyKTtcbiAgICAgICAgICAgIHRoaXMueGhyID0gbnVsbDtcbiAgICAgICAgfVxuICAgIH07XG4gICAgSFRUUFJlcXVlc3QucHJvdG90eXBlLm9uQ2h1bmsgPSBmdW5jdGlvbiAoc3RhdHVzLCBkYXRhKSB7XG4gICAgICAgIHdoaWxlICh0cnVlKSB7XG4gICAgICAgICAgICB2YXIgY2h1bmsgPSB0aGlzLmFkdmFuY2VCdWZmZXIoZGF0YSk7XG4gICAgICAgICAgICBpZiAoY2h1bmspIHtcbiAgICAgICAgICAgICAgICB0aGlzLmVtaXQoJ2NodW5rJywgeyBzdGF0dXM6IHN0YXR1cywgZGF0YTogY2h1bmsgfSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICBicmVhaztcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgICBpZiAodGhpcy5pc0J1ZmZlclRvb0xvbmcoZGF0YSkpIHtcbiAgICAgICAgICAgIHRoaXMuZW1pdCgnYnVmZmVyX3Rvb19sb25nJyk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIEhUVFBSZXF1ZXN0LnByb3RvdHlwZS5hZHZhbmNlQnVmZmVyID0gZnVuY3Rpb24gKGJ1ZmZlcikge1xuICAgICAgICB2YXIgdW5yZWFkRGF0YSA9IGJ1ZmZlci5zbGljZSh0aGlzLnBvc2l0aW9uKTtcbiAgICAgICAgdmFyIGVuZE9mTGluZVBvc2l0aW9uID0gdW5yZWFkRGF0YS5pbmRleE9mKCdcXG4nKTtcbiAgICAgICAgaWYgKGVuZE9mTGluZVBvc2l0aW9uICE9PSAtMSkge1xuICAgICAgICAgICAgdGhpcy5wb3NpdGlvbiArPSBlbmRPZkxpbmVQb3NpdGlvbiArIDE7XG4gICAgICAgICAgICByZXR1cm4gdW5yZWFkRGF0YS5zbGljZSgwLCBlbmRPZkxpbmVQb3NpdGlvbik7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICByZXR1cm4gbnVsbDtcbiAgICAgICAgfVxuICAgIH07XG4gICAgSFRUUFJlcXVlc3QucHJvdG90eXBlLmlzQnVmZmVyVG9vTG9uZyA9IGZ1bmN0aW9uIChidWZmZXIpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMucG9zaXRpb24gPT09IGJ1ZmZlci5sZW5ndGggJiYgYnVmZmVyLmxlbmd0aCA+IE1BWF9CVUZGRVJfTEVOR1RIO1xuICAgIH07XG4gICAgcmV0dXJuIEhUVFBSZXF1ZXN0O1xufShkaXNwYXRjaGVyKSk7XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciBodHRwX3JlcXVlc3QgPSAoaHR0cF9yZXF1ZXN0X0hUVFBSZXF1ZXN0KTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS9odHRwL3N0YXRlLnRzXG52YXIgU3RhdGU7XG4oZnVuY3Rpb24gKFN0YXRlKSB7XG4gICAgU3RhdGVbU3RhdGVbXCJDT05ORUNUSU5HXCJdID0gMF0gPSBcIkNPTk5FQ1RJTkdcIjtcbiAgICBTdGF0ZVtTdGF0ZVtcIk9QRU5cIl0gPSAxXSA9IFwiT1BFTlwiO1xuICAgIFN0YXRlW1N0YXRlW1wiQ0xPU0VEXCJdID0gM10gPSBcIkNMT1NFRFwiO1xufSkoU3RhdGUgfHwgKFN0YXRlID0ge30pKTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHN0YXRlID0gKFN0YXRlKTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS9odHRwL2h0dHBfc29ja2V0LnRzXG5cblxuXG52YXIgYXV0b0luY3JlbWVudCA9IDE7XG52YXIgaHR0cF9zb2NrZXRfSFRUUFNvY2tldCA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gSFRUUFNvY2tldChob29rcywgdXJsKSB7XG4gICAgICAgIHRoaXMuaG9va3MgPSBob29rcztcbiAgICAgICAgdGhpcy5zZXNzaW9uID0gcmFuZG9tTnVtYmVyKDEwMDApICsgJy8nICsgcmFuZG9tU3RyaW5nKDgpO1xuICAgICAgICB0aGlzLmxvY2F0aW9uID0gZ2V0TG9jYXRpb24odXJsKTtcbiAgICAgICAgdGhpcy5yZWFkeVN0YXRlID0gc3RhdGUuQ09OTkVDVElORztcbiAgICAgICAgdGhpcy5vcGVuU3RyZWFtKCk7XG4gICAgfVxuICAgIEhUVFBTb2NrZXQucHJvdG90eXBlLnNlbmQgPSBmdW5jdGlvbiAocGF5bG9hZCkge1xuICAgICAgICByZXR1cm4gdGhpcy5zZW5kUmF3KEpTT04uc3RyaW5naWZ5KFtwYXlsb2FkXSkpO1xuICAgIH07XG4gICAgSFRUUFNvY2tldC5wcm90b3R5cGUucGluZyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy5ob29rcy5zZW5kSGVhcnRiZWF0KHRoaXMpO1xuICAgIH07XG4gICAgSFRUUFNvY2tldC5wcm90b3R5cGUuY2xvc2UgPSBmdW5jdGlvbiAoY29kZSwgcmVhc29uKSB7XG4gICAgICAgIHRoaXMub25DbG9zZShjb2RlLCByZWFzb24sIHRydWUpO1xuICAgIH07XG4gICAgSFRUUFNvY2tldC5wcm90b3R5cGUuc2VuZFJhdyA9IGZ1bmN0aW9uIChwYXlsb2FkKSB7XG4gICAgICAgIGlmICh0aGlzLnJlYWR5U3RhdGUgPT09IHN0YXRlLk9QRU4pIHtcbiAgICAgICAgICAgIHRyeSB7XG4gICAgICAgICAgICAgICAgcnVudGltZS5jcmVhdGVTb2NrZXRSZXF1ZXN0KCdQT1NUJywgZ2V0VW5pcXVlVVJMKGdldFNlbmRVUkwodGhpcy5sb2NhdGlvbiwgdGhpcy5zZXNzaW9uKSkpLnN0YXJ0KHBheWxvYWQpO1xuICAgICAgICAgICAgICAgIHJldHVybiB0cnVlO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgY2F0Y2ggKGUpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIEhUVFBTb2NrZXQucHJvdG90eXBlLnJlY29ubmVjdCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy5jbG9zZVN0cmVhbSgpO1xuICAgICAgICB0aGlzLm9wZW5TdHJlYW0oKTtcbiAgICB9O1xuICAgIEhUVFBTb2NrZXQucHJvdG90eXBlLm9uQ2xvc2UgPSBmdW5jdGlvbiAoY29kZSwgcmVhc29uLCB3YXNDbGVhbikge1xuICAgICAgICB0aGlzLmNsb3NlU3RyZWFtKCk7XG4gICAgICAgIHRoaXMucmVhZHlTdGF0ZSA9IHN0YXRlLkNMT1NFRDtcbiAgICAgICAgaWYgKHRoaXMub25jbG9zZSkge1xuICAgICAgICAgICAgdGhpcy5vbmNsb3NlKHtcbiAgICAgICAgICAgICAgICBjb2RlOiBjb2RlLFxuICAgICAgICAgICAgICAgIHJlYXNvbjogcmVhc29uLFxuICAgICAgICAgICAgICAgIHdhc0NsZWFuOiB3YXNDbGVhblxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIEhUVFBTb2NrZXQucHJvdG90eXBlLm9uQ2h1bmsgPSBmdW5jdGlvbiAoY2h1bmspIHtcbiAgICAgICAgaWYgKGNodW5rLnN0YXR1cyAhPT0gMjAwKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cbiAgICAgICAgaWYgKHRoaXMucmVhZHlTdGF0ZSA9PT0gc3RhdGUuT1BFTikge1xuICAgICAgICAgICAgdGhpcy5vbkFjdGl2aXR5KCk7XG4gICAgICAgIH1cbiAgICAgICAgdmFyIHBheWxvYWQ7XG4gICAgICAgIHZhciB0eXBlID0gY2h1bmsuZGF0YS5zbGljZSgwLCAxKTtcbiAgICAgICAgc3dpdGNoICh0eXBlKSB7XG4gICAgICAgICAgICBjYXNlICdvJzpcbiAgICAgICAgICAgICAgICBwYXlsb2FkID0gSlNPTi5wYXJzZShjaHVuay5kYXRhLnNsaWNlKDEpIHx8ICd7fScpO1xuICAgICAgICAgICAgICAgIHRoaXMub25PcGVuKHBheWxvYWQpO1xuICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgY2FzZSAnYSc6XG4gICAgICAgICAgICAgICAgcGF5bG9hZCA9IEpTT04ucGFyc2UoY2h1bmsuZGF0YS5zbGljZSgxKSB8fCAnW10nKTtcbiAgICAgICAgICAgICAgICBmb3IgKHZhciBpID0gMDsgaSA8IHBheWxvYWQubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5vbkV2ZW50KHBheWxvYWRbaV0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBicmVhaztcbiAgICAgICAgICAgIGNhc2UgJ20nOlxuICAgICAgICAgICAgICAgIHBheWxvYWQgPSBKU09OLnBhcnNlKGNodW5rLmRhdGEuc2xpY2UoMSkgfHwgJ251bGwnKTtcbiAgICAgICAgICAgICAgICB0aGlzLm9uRXZlbnQocGF5bG9hZCk7XG4gICAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgICAgICBjYXNlICdoJzpcbiAgICAgICAgICAgICAgICB0aGlzLmhvb2tzLm9uSGVhcnRiZWF0KHRoaXMpO1xuICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgY2FzZSAnYyc6XG4gICAgICAgICAgICAgICAgcGF5bG9hZCA9IEpTT04ucGFyc2UoY2h1bmsuZGF0YS5zbGljZSgxKSB8fCAnW10nKTtcbiAgICAgICAgICAgICAgICB0aGlzLm9uQ2xvc2UocGF5bG9hZFswXSwgcGF5bG9hZFsxXSwgdHJ1ZSk7XG4gICAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgIH1cbiAgICB9O1xuICAgIEhUVFBTb2NrZXQucHJvdG90eXBlLm9uT3BlbiA9IGZ1bmN0aW9uIChvcHRpb25zKSB7XG4gICAgICAgIGlmICh0aGlzLnJlYWR5U3RhdGUgPT09IHN0YXRlLkNPTk5FQ1RJTkcpIHtcbiAgICAgICAgICAgIGlmIChvcHRpb25zICYmIG9wdGlvbnMuaG9zdG5hbWUpIHtcbiAgICAgICAgICAgICAgICB0aGlzLmxvY2F0aW9uLmJhc2UgPSByZXBsYWNlSG9zdCh0aGlzLmxvY2F0aW9uLmJhc2UsIG9wdGlvbnMuaG9zdG5hbWUpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgdGhpcy5yZWFkeVN0YXRlID0gc3RhdGUuT1BFTjtcbiAgICAgICAgICAgIGlmICh0aGlzLm9ub3Blbikge1xuICAgICAgICAgICAgICAgIHRoaXMub25vcGVuKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICB0aGlzLm9uQ2xvc2UoMTAwNiwgJ1NlcnZlciBsb3N0IHNlc3Npb24nLCB0cnVlKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgSFRUUFNvY2tldC5wcm90b3R5cGUub25FdmVudCA9IGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICBpZiAodGhpcy5yZWFkeVN0YXRlID09PSBzdGF0ZS5PUEVOICYmIHRoaXMub25tZXNzYWdlKSB7XG4gICAgICAgICAgICB0aGlzLm9ubWVzc2FnZSh7IGRhdGE6IGV2ZW50IH0pO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBIVFRQU29ja2V0LnByb3RvdHlwZS5vbkFjdGl2aXR5ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBpZiAodGhpcy5vbmFjdGl2aXR5KSB7XG4gICAgICAgICAgICB0aGlzLm9uYWN0aXZpdHkoKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgSFRUUFNvY2tldC5wcm90b3R5cGUub25FcnJvciA9IGZ1bmN0aW9uIChlcnJvcikge1xuICAgICAgICBpZiAodGhpcy5vbmVycm9yKSB7XG4gICAgICAgICAgICB0aGlzLm9uZXJyb3IoZXJyb3IpO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBIVFRQU29ja2V0LnByb3RvdHlwZS5vcGVuU3RyZWFtID0gZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICB0aGlzLnN0cmVhbSA9IHJ1bnRpbWUuY3JlYXRlU29ja2V0UmVxdWVzdCgnUE9TVCcsIGdldFVuaXF1ZVVSTCh0aGlzLmhvb2tzLmdldFJlY2VpdmVVUkwodGhpcy5sb2NhdGlvbiwgdGhpcy5zZXNzaW9uKSkpO1xuICAgICAgICB0aGlzLnN0cmVhbS5iaW5kKCdjaHVuaycsIGZ1bmN0aW9uIChjaHVuaykge1xuICAgICAgICAgICAgX3RoaXMub25DaHVuayhjaHVuayk7XG4gICAgICAgIH0pO1xuICAgICAgICB0aGlzLnN0cmVhbS5iaW5kKCdmaW5pc2hlZCcsIGZ1bmN0aW9uIChzdGF0dXMpIHtcbiAgICAgICAgICAgIF90aGlzLmhvb2tzLm9uRmluaXNoZWQoX3RoaXMsIHN0YXR1cyk7XG4gICAgICAgIH0pO1xuICAgICAgICB0aGlzLnN0cmVhbS5iaW5kKCdidWZmZXJfdG9vX2xvbmcnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBfdGhpcy5yZWNvbm5lY3QoKTtcbiAgICAgICAgfSk7XG4gICAgICAgIHRyeSB7XG4gICAgICAgICAgICB0aGlzLnN0cmVhbS5zdGFydCgpO1xuICAgICAgICB9XG4gICAgICAgIGNhdGNoIChlcnJvcikge1xuICAgICAgICAgICAgdXRpbC5kZWZlcihmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgX3RoaXMub25FcnJvcihlcnJvcik7XG4gICAgICAgICAgICAgICAgX3RoaXMub25DbG9zZSgxMDA2LCAnQ291bGQgbm90IHN0YXJ0IHN0cmVhbWluZycsIGZhbHNlKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBIVFRQU29ja2V0LnByb3RvdHlwZS5jbG9zZVN0cmVhbSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHRoaXMuc3RyZWFtKSB7XG4gICAgICAgICAgICB0aGlzLnN0cmVhbS51bmJpbmRfYWxsKCk7XG4gICAgICAgICAgICB0aGlzLnN0cmVhbS5jbG9zZSgpO1xuICAgICAgICAgICAgdGhpcy5zdHJlYW0gPSBudWxsO1xuICAgICAgICB9XG4gICAgfTtcbiAgICByZXR1cm4gSFRUUFNvY2tldDtcbn0oKSk7XG5mdW5jdGlvbiBnZXRMb2NhdGlvbih1cmwpIHtcbiAgICB2YXIgcGFydHMgPSAvKFteXFw/XSopXFwvKihcXD8/LiopLy5leGVjKHVybCk7XG4gICAgcmV0dXJuIHtcbiAgICAgICAgYmFzZTogcGFydHNbMV0sXG4gICAgICAgIHF1ZXJ5U3RyaW5nOiBwYXJ0c1syXVxuICAgIH07XG59XG5mdW5jdGlvbiBnZXRTZW5kVVJMKHVybCwgc2Vzc2lvbikge1xuICAgIHJldHVybiB1cmwuYmFzZSArICcvJyArIHNlc3Npb24gKyAnL3hocl9zZW5kJztcbn1cbmZ1bmN0aW9uIGdldFVuaXF1ZVVSTCh1cmwpIHtcbiAgICB2YXIgc2VwYXJhdG9yID0gdXJsLmluZGV4T2YoJz8nKSA9PT0gLTEgPyAnPycgOiAnJic7XG4gICAgcmV0dXJuIHVybCArIHNlcGFyYXRvciArICd0PScgKyArbmV3IERhdGUoKSArICcmbj0nICsgYXV0b0luY3JlbWVudCsrO1xufVxuZnVuY3Rpb24gcmVwbGFjZUhvc3QodXJsLCBob3N0bmFtZSkge1xuICAgIHZhciB1cmxQYXJ0cyA9IC8oaHR0cHM/OlxcL1xcLykoW15cXC86XSspKChcXC98Oik/LiopLy5leGVjKHVybCk7XG4gICAgcmV0dXJuIHVybFBhcnRzWzFdICsgaG9zdG5hbWUgKyB1cmxQYXJ0c1szXTtcbn1cbmZ1bmN0aW9uIHJhbmRvbU51bWJlcihtYXgpIHtcbiAgICByZXR1cm4gTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogbWF4KTtcbn1cbmZ1bmN0aW9uIHJhbmRvbVN0cmluZyhsZW5ndGgpIHtcbiAgICB2YXIgcmVzdWx0ID0gW107XG4gICAgZm9yICh2YXIgaSA9IDA7IGkgPCBsZW5ndGg7IGkrKykge1xuICAgICAgICByZXN1bHQucHVzaChyYW5kb21OdW1iZXIoMzIpLnRvU3RyaW5nKDMyKSk7XG4gICAgfVxuICAgIHJldHVybiByZXN1bHQuam9pbignJyk7XG59XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciBodHRwX3NvY2tldCA9IChodHRwX3NvY2tldF9IVFRQU29ja2V0KTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS9odHRwL2h0dHBfc3RyZWFtaW5nX3NvY2tldC50c1xudmFyIGh0dHBfc3RyZWFtaW5nX3NvY2tldF9ob29rcyA9IHtcbiAgICBnZXRSZWNlaXZlVVJMOiBmdW5jdGlvbiAodXJsLCBzZXNzaW9uKSB7XG4gICAgICAgIHJldHVybiB1cmwuYmFzZSArICcvJyArIHNlc3Npb24gKyAnL3hocl9zdHJlYW1pbmcnICsgdXJsLnF1ZXJ5U3RyaW5nO1xuICAgIH0sXG4gICAgb25IZWFydGJlYXQ6IGZ1bmN0aW9uIChzb2NrZXQpIHtcbiAgICAgICAgc29ja2V0LnNlbmRSYXcoJ1tdJyk7XG4gICAgfSxcbiAgICBzZW5kSGVhcnRiZWF0OiBmdW5jdGlvbiAoc29ja2V0KSB7XG4gICAgICAgIHNvY2tldC5zZW5kUmF3KCdbXScpO1xuICAgIH0sXG4gICAgb25GaW5pc2hlZDogZnVuY3Rpb24gKHNvY2tldCwgc3RhdHVzKSB7XG4gICAgICAgIHNvY2tldC5vbkNsb3NlKDEwMDYsICdDb25uZWN0aW9uIGludGVycnVwdGVkICgnICsgc3RhdHVzICsgJyknLCBmYWxzZSk7XG4gICAgfVxufTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIGh0dHBfc3RyZWFtaW5nX3NvY2tldCA9IChodHRwX3N0cmVhbWluZ19zb2NrZXRfaG9va3MpO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL2h0dHAvaHR0cF9wb2xsaW5nX3NvY2tldC50c1xudmFyIGh0dHBfcG9sbGluZ19zb2NrZXRfaG9va3MgPSB7XG4gICAgZ2V0UmVjZWl2ZVVSTDogZnVuY3Rpb24gKHVybCwgc2Vzc2lvbikge1xuICAgICAgICByZXR1cm4gdXJsLmJhc2UgKyAnLycgKyBzZXNzaW9uICsgJy94aHInICsgdXJsLnF1ZXJ5U3RyaW5nO1xuICAgIH0sXG4gICAgb25IZWFydGJlYXQ6IGZ1bmN0aW9uICgpIHtcbiAgICB9LFxuICAgIHNlbmRIZWFydGJlYXQ6IGZ1bmN0aW9uIChzb2NrZXQpIHtcbiAgICAgICAgc29ja2V0LnNlbmRSYXcoJ1tdJyk7XG4gICAgfSxcbiAgICBvbkZpbmlzaGVkOiBmdW5jdGlvbiAoc29ja2V0LCBzdGF0dXMpIHtcbiAgICAgICAgaWYgKHN0YXR1cyA9PT0gMjAwKSB7XG4gICAgICAgICAgICBzb2NrZXQucmVjb25uZWN0KCk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICBzb2NrZXQub25DbG9zZSgxMDA2LCAnQ29ubmVjdGlvbiBpbnRlcnJ1cHRlZCAoJyArIHN0YXR1cyArICcpJywgZmFsc2UpO1xuICAgICAgICB9XG4gICAgfVxufTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIGh0dHBfcG9sbGluZ19zb2NrZXQgPSAoaHR0cF9wb2xsaW5nX3NvY2tldF9ob29rcyk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL3J1bnRpbWVzL2lzb21vcnBoaWMvaHR0cC9odHRwX3hocl9yZXF1ZXN0LnRzXG5cbnZhciBodHRwX3hocl9yZXF1ZXN0X2hvb2tzID0ge1xuICAgIGdldFJlcXVlc3Q6IGZ1bmN0aW9uIChzb2NrZXQpIHtcbiAgICAgICAgdmFyIENvbnN0cnVjdG9yID0gcnVudGltZS5nZXRYSFJBUEkoKTtcbiAgICAgICAgdmFyIHhociA9IG5ldyBDb25zdHJ1Y3RvcigpO1xuICAgICAgICB4aHIub25yZWFkeXN0YXRlY2hhbmdlID0geGhyLm9ucHJvZ3Jlc3MgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBzd2l0Y2ggKHhoci5yZWFkeVN0YXRlKSB7XG4gICAgICAgICAgICAgICAgY2FzZSAzOlxuICAgICAgICAgICAgICAgICAgICBpZiAoeGhyLnJlc3BvbnNlVGV4dCAmJiB4aHIucmVzcG9uc2VUZXh0Lmxlbmd0aCA+IDApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHNvY2tldC5vbkNodW5rKHhoci5zdGF0dXMsIHhoci5yZXNwb25zZVRleHQpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgICAgIGNhc2UgNDpcbiAgICAgICAgICAgICAgICAgICAgaWYgKHhoci5yZXNwb25zZVRleHQgJiYgeGhyLnJlc3BvbnNlVGV4dC5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBzb2NrZXQub25DaHVuayh4aHIuc3RhdHVzLCB4aHIucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICBzb2NrZXQuZW1pdCgnZmluaXNoZWQnLCB4aHIuc3RhdHVzKTtcbiAgICAgICAgICAgICAgICAgICAgc29ja2V0LmNsb3NlKCk7XG4gICAgICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgfVxuICAgICAgICB9O1xuICAgICAgICByZXR1cm4geGhyO1xuICAgIH0sXG4gICAgYWJvcnRSZXF1ZXN0OiBmdW5jdGlvbiAoeGhyKSB7XG4gICAgICAgIHhoci5vbnJlYWR5c3RhdGVjaGFuZ2UgPSBudWxsO1xuICAgICAgICB4aHIuYWJvcnQoKTtcbiAgICB9XG59O1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgaHR0cF94aHJfcmVxdWVzdCA9IChodHRwX3hocl9yZXF1ZXN0X2hvb2tzKTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvcnVudGltZXMvaXNvbW9ycGhpYy9odHRwL2h0dHAudHNcblxuXG5cblxuXG52YXIgSFRUUCA9IHtcbiAgICBjcmVhdGVTdHJlYW1pbmdTb2NrZXQ6IGZ1bmN0aW9uICh1cmwpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMuY3JlYXRlU29ja2V0KGh0dHBfc3RyZWFtaW5nX3NvY2tldCwgdXJsKTtcbiAgICB9LFxuICAgIGNyZWF0ZVBvbGxpbmdTb2NrZXQ6IGZ1bmN0aW9uICh1cmwpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMuY3JlYXRlU29ja2V0KGh0dHBfcG9sbGluZ19zb2NrZXQsIHVybCk7XG4gICAgfSxcbiAgICBjcmVhdGVTb2NrZXQ6IGZ1bmN0aW9uIChob29rcywgdXJsKSB7XG4gICAgICAgIHJldHVybiBuZXcgaHR0cF9zb2NrZXQoaG9va3MsIHVybCk7XG4gICAgfSxcbiAgICBjcmVhdGVYSFI6IGZ1bmN0aW9uIChtZXRob2QsIHVybCkge1xuICAgICAgICByZXR1cm4gdGhpcy5jcmVhdGVSZXF1ZXN0KGh0dHBfeGhyX3JlcXVlc3QsIG1ldGhvZCwgdXJsKTtcbiAgICB9LFxuICAgIGNyZWF0ZVJlcXVlc3Q6IGZ1bmN0aW9uIChob29rcywgbWV0aG9kLCB1cmwpIHtcbiAgICAgICAgcmV0dXJuIG5ldyBodHRwX3JlcXVlc3QoaG9va3MsIG1ldGhvZCwgdXJsKTtcbiAgICB9XG59O1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgaHR0cF9odHRwID0gKEhUVFApO1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9ydW50aW1lcy93ZWIvaHR0cC9odHRwLnRzXG5cblxuaHR0cF9odHRwLmNyZWF0ZVhEUiA9IGZ1bmN0aW9uIChtZXRob2QsIHVybCkge1xuICAgIHJldHVybiB0aGlzLmNyZWF0ZVJlcXVlc3QoaHR0cF94ZG9tYWluX3JlcXVlc3QsIG1ldGhvZCwgdXJsKTtcbn07XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciB3ZWJfaHR0cF9odHRwID0gKGh0dHBfaHR0cCk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL3J1bnRpbWVzL3dlYi9ydW50aW1lLnRzXG5cblxuXG5cblxuXG5cblxuXG5cblxuXG52YXIgUnVudGltZSA9IHtcbiAgICBuZXh0QXV0aENhbGxiYWNrSUQ6IDEsXG4gICAgYXV0aF9jYWxsYmFja3M6IHt9LFxuICAgIFNjcmlwdFJlY2VpdmVyczogU2NyaXB0UmVjZWl2ZXJzLFxuICAgIERlcGVuZGVuY2llc1JlY2VpdmVyczogRGVwZW5kZW5jaWVzUmVjZWl2ZXJzLFxuICAgIGdldERlZmF1bHRTdHJhdGVneTogZGVmYXVsdF9zdHJhdGVneSxcbiAgICBUcmFuc3BvcnRzOiB0cmFuc3BvcnRzX3RyYW5zcG9ydHMsXG4gICAgdHJhbnNwb3J0Q29ubmVjdGlvbkluaXRpYWxpemVyOiB0cmFuc3BvcnRfY29ubmVjdGlvbl9pbml0aWFsaXplcixcbiAgICBIVFRQRmFjdG9yeTogd2ViX2h0dHBfaHR0cCxcbiAgICBUaW1lbGluZVRyYW5zcG9ydDoganNvbnBfdGltZWxpbmUsXG4gICAgZ2V0WEhSQVBJOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiB3aW5kb3cuWE1MSHR0cFJlcXVlc3Q7XG4gICAgfSxcbiAgICBnZXRXZWJTb2NrZXRBUEk6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIHdpbmRvdy5XZWJTb2NrZXQgfHwgd2luZG93Lk1veldlYlNvY2tldDtcbiAgICB9LFxuICAgIHNldHVwOiBmdW5jdGlvbiAoUHVzaGVyQ2xhc3MpIHtcbiAgICAgICAgdmFyIF90aGlzID0gdGhpcztcbiAgICAgICAgd2luZG93LlB1c2hlciA9IFB1c2hlckNsYXNzO1xuICAgICAgICB2YXIgaW5pdGlhbGl6ZU9uRG9jdW1lbnRCb2R5ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgX3RoaXMub25Eb2N1bWVudEJvZHkoUHVzaGVyQ2xhc3MucmVhZHkpO1xuICAgICAgICB9O1xuICAgICAgICBpZiAoIXdpbmRvdy5KU09OKSB7XG4gICAgICAgICAgICBEZXBlbmRlbmNpZXMubG9hZCgnanNvbjInLCB7fSwgaW5pdGlhbGl6ZU9uRG9jdW1lbnRCb2R5KTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIGluaXRpYWxpemVPbkRvY3VtZW50Qm9keSgpO1xuICAgICAgICB9XG4gICAgfSxcbiAgICBnZXREb2N1bWVudDogZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gZG9jdW1lbnQ7XG4gICAgfSxcbiAgICBnZXRQcm90b2NvbDogZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdGhpcy5nZXREb2N1bWVudCgpLmxvY2F0aW9uLnByb3RvY29sO1xuICAgIH0sXG4gICAgZ2V0QXV0aG9yaXplcnM6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIHsgYWpheDogeGhyX2F1dGgsIGpzb25wOiBqc29ucF9hdXRoIH07XG4gICAgfSxcbiAgICBvbkRvY3VtZW50Qm9keTogZnVuY3Rpb24gKGNhbGxiYWNrKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIGlmIChkb2N1bWVudC5ib2R5KSB7XG4gICAgICAgICAgICBjYWxsYmFjaygpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgX3RoaXMub25Eb2N1bWVudEJvZHkoY2FsbGJhY2spO1xuICAgICAgICAgICAgfSwgMCk7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIGNyZWF0ZUpTT05QUmVxdWVzdDogZnVuY3Rpb24gKHVybCwgZGF0YSkge1xuICAgICAgICByZXR1cm4gbmV3IGpzb25wX3JlcXVlc3QodXJsLCBkYXRhKTtcbiAgICB9LFxuICAgIGNyZWF0ZVNjcmlwdFJlcXVlc3Q6IGZ1bmN0aW9uIChzcmMpIHtcbiAgICAgICAgcmV0dXJuIG5ldyBzY3JpcHRfcmVxdWVzdChzcmMpO1xuICAgIH0sXG4gICAgZ2V0TG9jYWxTdG9yYWdlOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRyeSB7XG4gICAgICAgICAgICByZXR1cm4gd2luZG93LmxvY2FsU3RvcmFnZTtcbiAgICAgICAgfVxuICAgICAgICBjYXRjaCAoZSkge1xuICAgICAgICAgICAgcmV0dXJuIHVuZGVmaW5lZDtcbiAgICAgICAgfVxuICAgIH0sXG4gICAgY3JlYXRlWEhSOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmICh0aGlzLmdldFhIUkFQSSgpKSB7XG4gICAgICAgICAgICByZXR1cm4gdGhpcy5jcmVhdGVYTUxIdHRwUmVxdWVzdCgpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgcmV0dXJuIHRoaXMuY3JlYXRlTWljcm9zb2Z0WEhSKCk7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIGNyZWF0ZVhNTEh0dHBSZXF1ZXN0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBDb25zdHJ1Y3RvciA9IHRoaXMuZ2V0WEhSQVBJKCk7XG4gICAgICAgIHJldHVybiBuZXcgQ29uc3RydWN0b3IoKTtcbiAgICB9LFxuICAgIGNyZWF0ZU1pY3Jvc29mdFhIUjogZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gbmV3IEFjdGl2ZVhPYmplY3QoJ01pY3Jvc29mdC5YTUxIVFRQJyk7XG4gICAgfSxcbiAgICBnZXROZXR3b3JrOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBuZXRfaW5mb19OZXR3b3JrO1xuICAgIH0sXG4gICAgY3JlYXRlV2ViU29ja2V0OiBmdW5jdGlvbiAodXJsKSB7XG4gICAgICAgIHZhciBDb25zdHJ1Y3RvciA9IHRoaXMuZ2V0V2ViU29ja2V0QVBJKCk7XG4gICAgICAgIHJldHVybiBuZXcgQ29uc3RydWN0b3IodXJsKTtcbiAgICB9LFxuICAgIGNyZWF0ZVNvY2tldFJlcXVlc3Q6IGZ1bmN0aW9uIChtZXRob2QsIHVybCkge1xuICAgICAgICBpZiAodGhpcy5pc1hIUlN1cHBvcnRlZCgpKSB7XG4gICAgICAgICAgICByZXR1cm4gdGhpcy5IVFRQRmFjdG9yeS5jcmVhdGVYSFIobWV0aG9kLCB1cmwpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2UgaWYgKHRoaXMuaXNYRFJTdXBwb3J0ZWQodXJsLmluZGV4T2YoJ2h0dHBzOicpID09PSAwKSkge1xuICAgICAgICAgICAgcmV0dXJuIHRoaXMuSFRUUEZhY3RvcnkuY3JlYXRlWERSKG1ldGhvZCwgdXJsKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIHRocm93ICdDcm9zcy1vcmlnaW4gSFRUUCByZXF1ZXN0cyBhcmUgbm90IHN1cHBvcnRlZCc7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIGlzWEhSU3VwcG9ydGVkOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBDb25zdHJ1Y3RvciA9IHRoaXMuZ2V0WEhSQVBJKCk7XG4gICAgICAgIHJldHVybiAoQm9vbGVhbihDb25zdHJ1Y3RvcikgJiYgbmV3IENvbnN0cnVjdG9yKCkud2l0aENyZWRlbnRpYWxzICE9PSB1bmRlZmluZWQpO1xuICAgIH0sXG4gICAgaXNYRFJTdXBwb3J0ZWQ6IGZ1bmN0aW9uICh1c2VUTFMpIHtcbiAgICAgICAgdmFyIHByb3RvY29sID0gdXNlVExTID8gJ2h0dHBzOicgOiAnaHR0cDonO1xuICAgICAgICB2YXIgZG9jdW1lbnRQcm90b2NvbCA9IHRoaXMuZ2V0UHJvdG9jb2woKTtcbiAgICAgICAgcmV0dXJuIChCb29sZWFuKHdpbmRvd1snWERvbWFpblJlcXVlc3QnXSkgJiYgZG9jdW1lbnRQcm90b2NvbCA9PT0gcHJvdG9jb2wpO1xuICAgIH0sXG4gICAgYWRkVW5sb2FkTGlzdGVuZXI6IGZ1bmN0aW9uIChsaXN0ZW5lcikge1xuICAgICAgICBpZiAod2luZG93LmFkZEV2ZW50TGlzdGVuZXIgIT09IHVuZGVmaW5lZCkge1xuICAgICAgICAgICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ3VubG9hZCcsIGxpc3RlbmVyLCBmYWxzZSk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAod2luZG93LmF0dGFjaEV2ZW50ICE9PSB1bmRlZmluZWQpIHtcbiAgICAgICAgICAgIHdpbmRvdy5hdHRhY2hFdmVudCgnb251bmxvYWQnLCBsaXN0ZW5lcik7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIHJlbW92ZVVubG9hZExpc3RlbmVyOiBmdW5jdGlvbiAobGlzdGVuZXIpIHtcbiAgICAgICAgaWYgKHdpbmRvdy5hZGRFdmVudExpc3RlbmVyICE9PSB1bmRlZmluZWQpIHtcbiAgICAgICAgICAgIHdpbmRvdy5yZW1vdmVFdmVudExpc3RlbmVyKCd1bmxvYWQnLCBsaXN0ZW5lciwgZmFsc2UpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2UgaWYgKHdpbmRvdy5kZXRhY2hFdmVudCAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAgICAgICB3aW5kb3cuZGV0YWNoRXZlbnQoJ29udW5sb2FkJywgbGlzdGVuZXIpO1xuICAgICAgICB9XG4gICAgfVxufTtcbi8qIGhhcm1vbnkgZGVmYXVsdCBleHBvcnQgKi8gdmFyIHJ1bnRpbWUgPSAoUnVudGltZSk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvdGltZWxpbmUvbGV2ZWwudHNcbnZhciBUaW1lbGluZUxldmVsO1xuKGZ1bmN0aW9uIChUaW1lbGluZUxldmVsKSB7XG4gICAgVGltZWxpbmVMZXZlbFtUaW1lbGluZUxldmVsW1wiRVJST1JcIl0gPSAzXSA9IFwiRVJST1JcIjtcbiAgICBUaW1lbGluZUxldmVsW1RpbWVsaW5lTGV2ZWxbXCJJTkZPXCJdID0gNl0gPSBcIklORk9cIjtcbiAgICBUaW1lbGluZUxldmVsW1RpbWVsaW5lTGV2ZWxbXCJERUJVR1wiXSA9IDddID0gXCJERUJVR1wiO1xufSkoVGltZWxpbmVMZXZlbCB8fCAoVGltZWxpbmVMZXZlbCA9IHt9KSk7XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciB0aW1lbGluZV9sZXZlbCA9IChUaW1lbGluZUxldmVsKTtcblxuLy8gQ09OQ0FURU5BVEVEIE1PRFVMRTogLi9zcmMvY29yZS90aW1lbGluZS90aW1lbGluZS50c1xuXG5cblxudmFyIHRpbWVsaW5lX1RpbWVsaW5lID0gKGZ1bmN0aW9uICgpIHtcbiAgICBmdW5jdGlvbiBUaW1lbGluZShrZXksIHNlc3Npb24sIG9wdGlvbnMpIHtcbiAgICAgICAgdGhpcy5rZXkgPSBrZXk7XG4gICAgICAgIHRoaXMuc2Vzc2lvbiA9IHNlc3Npb247XG4gICAgICAgIHRoaXMuZXZlbnRzID0gW107XG4gICAgICAgIHRoaXMub3B0aW9ucyA9IG9wdGlvbnMgfHwge307XG4gICAgICAgIHRoaXMuc2VudCA9IDA7XG4gICAgICAgIHRoaXMudW5pcXVlSUQgPSAwO1xuICAgIH1cbiAgICBUaW1lbGluZS5wcm90b3R5cGUubG9nID0gZnVuY3Rpb24gKGxldmVsLCBldmVudCkge1xuICAgICAgICBpZiAobGV2ZWwgPD0gdGhpcy5vcHRpb25zLmxldmVsKSB7XG4gICAgICAgICAgICB0aGlzLmV2ZW50cy5wdXNoKGV4dGVuZCh7fSwgZXZlbnQsIHsgdGltZXN0YW1wOiB1dGlsLm5vdygpIH0pKTtcbiAgICAgICAgICAgIGlmICh0aGlzLm9wdGlvbnMubGltaXQgJiYgdGhpcy5ldmVudHMubGVuZ3RoID4gdGhpcy5vcHRpb25zLmxpbWl0KSB7XG4gICAgICAgICAgICAgICAgdGhpcy5ldmVudHMuc2hpZnQoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH07XG4gICAgVGltZWxpbmUucHJvdG90eXBlLmVycm9yID0gZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIHRoaXMubG9nKHRpbWVsaW5lX2xldmVsLkVSUk9SLCBldmVudCk7XG4gICAgfTtcbiAgICBUaW1lbGluZS5wcm90b3R5cGUuaW5mbyA9IGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICB0aGlzLmxvZyh0aW1lbGluZV9sZXZlbC5JTkZPLCBldmVudCk7XG4gICAgfTtcbiAgICBUaW1lbGluZS5wcm90b3R5cGUuZGVidWcgPSBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgdGhpcy5sb2codGltZWxpbmVfbGV2ZWwuREVCVUcsIGV2ZW50KTtcbiAgICB9O1xuICAgIFRpbWVsaW5lLnByb3RvdHlwZS5pc0VtcHR5ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdGhpcy5ldmVudHMubGVuZ3RoID09PSAwO1xuICAgIH07XG4gICAgVGltZWxpbmUucHJvdG90eXBlLnNlbmQgPSBmdW5jdGlvbiAoc2VuZGZuLCBjYWxsYmFjaykge1xuICAgICAgICB2YXIgX3RoaXMgPSB0aGlzO1xuICAgICAgICB2YXIgZGF0YSA9IGV4dGVuZCh7XG4gICAgICAgICAgICBzZXNzaW9uOiB0aGlzLnNlc3Npb24sXG4gICAgICAgICAgICBidW5kbGU6IHRoaXMuc2VudCArIDEsXG4gICAgICAgICAgICBrZXk6IHRoaXMua2V5LFxuICAgICAgICAgICAgbGliOiAnanMnLFxuICAgICAgICAgICAgdmVyc2lvbjogdGhpcy5vcHRpb25zLnZlcnNpb24sXG4gICAgICAgICAgICBjbHVzdGVyOiB0aGlzLm9wdGlvbnMuY2x1c3RlcixcbiAgICAgICAgICAgIGZlYXR1cmVzOiB0aGlzLm9wdGlvbnMuZmVhdHVyZXMsXG4gICAgICAgICAgICB0aW1lbGluZTogdGhpcy5ldmVudHNcbiAgICAgICAgfSwgdGhpcy5vcHRpb25zLnBhcmFtcyk7XG4gICAgICAgIHRoaXMuZXZlbnRzID0gW107XG4gICAgICAgIHNlbmRmbihkYXRhLCBmdW5jdGlvbiAoZXJyb3IsIHJlc3VsdCkge1xuICAgICAgICAgICAgaWYgKCFlcnJvcikge1xuICAgICAgICAgICAgICAgIF90aGlzLnNlbnQrKztcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGlmIChjYWxsYmFjaykge1xuICAgICAgICAgICAgICAgIGNhbGxiYWNrKGVycm9yLCByZXN1bHQpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgfTtcbiAgICBUaW1lbGluZS5wcm90b3R5cGUuZ2VuZXJhdGVVbmlxdWVJRCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy51bmlxdWVJRCsrO1xuICAgICAgICByZXR1cm4gdGhpcy51bmlxdWVJRDtcbiAgICB9O1xuICAgIHJldHVybiBUaW1lbGluZTtcbn0oKSk7XG4vKiBoYXJtb255IGRlZmF1bHQgZXhwb3J0ICovIHZhciB0aW1lbGluZV90aW1lbGluZSA9ICh0aW1lbGluZV9UaW1lbGluZSk7XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvc3RyYXRlZ2llcy90cmFuc3BvcnRfc3RyYXRlZ3kudHNcblxuXG5cblxudmFyIHRyYW5zcG9ydF9zdHJhdGVneV9UcmFuc3BvcnRTdHJhdGVneSA9IChmdW5jdGlvbiAoKSB7XG4gICAgZnVuY3Rpb24gVHJhbnNwb3J0U3RyYXRlZ3kobmFtZSwgcHJpb3JpdHksIHRyYW5zcG9ydCwgb3B0aW9ucykge1xuICAgICAgICB0aGlzLm5hbWUgPSBuYW1lO1xuICAgICAgICB0aGlzLnByaW9yaXR5ID0gcHJpb3JpdHk7XG4gICAgICAgIHRoaXMudHJhbnNwb3J0ID0gdHJhbnNwb3J0O1xuICAgICAgICB0aGlzLm9wdGlvbnMgPSBvcHRpb25zIHx8IHt9O1xuICAgIH1cbiAgICBUcmFuc3BvcnRTdHJhdGVneS5wcm90b3R5cGUuaXNTdXBwb3J0ZWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiB0aGlzLnRyYW5zcG9ydC5pc1N1cHBvcnRlZCh7XG4gICAgICAgICAgICB1c2VUTFM6IHRoaXMub3B0aW9ucy51c2VUTFNcbiAgICAgICAgfSk7XG4gICAgfTtcbiAgICBUcmFuc3BvcnRTdHJhdGVneS5wcm90b3R5cGUuY29ubmVjdCA9IGZ1bmN0aW9uIChtaW5Qcmlvcml0eSwgY2FsbGJhY2spIHtcbiAgICAgICAgdmFyIF90aGlzID0gdGhpcztcbiAgICAgICAgaWYgKCF0aGlzLmlzU3VwcG9ydGVkKCkpIHtcbiAgICAgICAgICAgIHJldHVybiBmYWlsQXR0ZW1wdChuZXcgVW5zdXBwb3J0ZWRTdHJhdGVneSgpLCBjYWxsYmFjayk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAodGhpcy5wcmlvcml0eSA8IG1pblByaW9yaXR5KSB7XG4gICAgICAgICAgICByZXR1cm4gZmFpbEF0dGVtcHQobmV3IFRyYW5zcG9ydFByaW9yaXR5VG9vTG93KCksIGNhbGxiYWNrKTtcbiAgICAgICAgfVxuICAgICAgICB2YXIgY29ubmVjdGVkID0gZmFsc2U7XG4gICAgICAgIHZhciB0cmFuc3BvcnQgPSB0aGlzLnRyYW5zcG9ydC5jcmVhdGVDb25uZWN0aW9uKHRoaXMubmFtZSwgdGhpcy5wcmlvcml0eSwgdGhpcy5vcHRpb25zLmtleSwgdGhpcy5vcHRpb25zKTtcbiAgICAgICAgdmFyIGhhbmRzaGFrZSA9IG51bGw7XG4gICAgICAgIHZhciBvbkluaXRpYWxpemVkID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgdHJhbnNwb3J0LnVuYmluZCgnaW5pdGlhbGl6ZWQnLCBvbkluaXRpYWxpemVkKTtcbiAgICAgICAgICAgIHRyYW5zcG9ydC5jb25uZWN0KCk7XG4gICAgICAgIH07XG4gICAgICAgIHZhciBvbk9wZW4gPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBoYW5kc2hha2UgPSBmYWN0b3J5LmNyZWF0ZUhhbmRzaGFrZSh0cmFuc3BvcnQsIGZ1bmN0aW9uIChyZXN1bHQpIHtcbiAgICAgICAgICAgICAgICBjb25uZWN0ZWQgPSB0cnVlO1xuICAgICAgICAgICAgICAgIHVuYmluZExpc3RlbmVycygpO1xuICAgICAgICAgICAgICAgIGNhbGxiYWNrKG51bGwsIHJlc3VsdCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfTtcbiAgICAgICAgdmFyIG9uRXJyb3IgPSBmdW5jdGlvbiAoZXJyb3IpIHtcbiAgICAgICAgICAgIHVuYmluZExpc3RlbmVycygpO1xuICAgICAgICAgICAgY2FsbGJhY2soZXJyb3IpO1xuICAgICAgICB9O1xuICAgICAgICB2YXIgb25DbG9zZWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICB1bmJpbmRMaXN0ZW5lcnMoKTtcbiAgICAgICAgICAgIHZhciBzZXJpYWxpemVkVHJhbnNwb3J0O1xuICAgICAgICAgICAgc2VyaWFsaXplZFRyYW5zcG9ydCA9IHNhZmVKU09OU3RyaW5naWZ5KHRyYW5zcG9ydCk7XG4gICAgICAgICAgICBjYWxsYmFjayhuZXcgVHJhbnNwb3J0Q2xvc2VkKHNlcmlhbGl6ZWRUcmFuc3BvcnQpKTtcbiAgICAgICAgfTtcbiAgICAgICAgdmFyIHVuYmluZExpc3RlbmVycyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIHRyYW5zcG9ydC51bmJpbmQoJ2luaXRpYWxpemVkJywgb25Jbml0aWFsaXplZCk7XG4gICAgICAgICAgICB0cmFuc3BvcnQudW5iaW5kKCdvcGVuJywgb25PcGVuKTtcbiAgICAgICAgICAgIHRyYW5zcG9ydC51bmJpbmQoJ2Vycm9yJywgb25FcnJvcik7XG4gICAgICAgICAgICB0cmFuc3BvcnQudW5iaW5kKCdjbG9zZWQnLCBvbkNsb3NlZCk7XG4gICAgICAgIH07XG4gICAgICAgIHRyYW5zcG9ydC5iaW5kKCdpbml0aWFsaXplZCcsIG9uSW5pdGlhbGl6ZWQpO1xuICAgICAgICB0cmFuc3BvcnQuYmluZCgnb3BlbicsIG9uT3Blbik7XG4gICAgICAgIHRyYW5zcG9ydC5iaW5kKCdlcnJvcicsIG9uRXJyb3IpO1xuICAgICAgICB0cmFuc3BvcnQuYmluZCgnY2xvc2VkJywgb25DbG9zZWQpO1xuICAgICAgICB0cmFuc3BvcnQuaW5pdGlhbGl6ZSgpO1xuICAgICAgICByZXR1cm4ge1xuICAgICAgICAgICAgYWJvcnQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBpZiAoY29ubmVjdGVkKSB7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgdW5iaW5kTGlzdGVuZXJzKCk7XG4gICAgICAgICAgICAgICAgaWYgKGhhbmRzaGFrZSkge1xuICAgICAgICAgICAgICAgICAgICBoYW5kc2hha2UuY2xvc2UoKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIHRyYW5zcG9ydC5jbG9zZSgpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBmb3JjZU1pblByaW9yaXR5OiBmdW5jdGlvbiAocCkge1xuICAgICAgICAgICAgICAgIGlmIChjb25uZWN0ZWQpIHtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBpZiAoX3RoaXMucHJpb3JpdHkgPCBwKSB7XG4gICAgICAgICAgICAgICAgICAgIGlmIChoYW5kc2hha2UpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGhhbmRzaGFrZS5jbG9zZSgpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgdHJhbnNwb3J0LmNsb3NlKCk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH07XG4gICAgfTtcbiAgICByZXR1cm4gVHJhbnNwb3J0U3RyYXRlZ3k7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgdHJhbnNwb3J0X3N0cmF0ZWd5ID0gKHRyYW5zcG9ydF9zdHJhdGVneV9UcmFuc3BvcnRTdHJhdGVneSk7XG5mdW5jdGlvbiBmYWlsQXR0ZW1wdChlcnJvciwgY2FsbGJhY2spIHtcbiAgICB1dGlsLmRlZmVyKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgY2FsbGJhY2soZXJyb3IpO1xuICAgIH0pO1xuICAgIHJldHVybiB7XG4gICAgICAgIGFib3J0OiBmdW5jdGlvbiAoKSB7IH0sXG4gICAgICAgIGZvcmNlTWluUHJpb3JpdHk6IGZ1bmN0aW9uICgpIHsgfVxuICAgIH07XG59XG5cbi8vIENPTkNBVEVOQVRFRCBNT0RVTEU6IC4vc3JjL2NvcmUvc3RyYXRlZ2llcy9zdHJhdGVneV9idWlsZGVyLnRzXG5cblxuXG5cblxudmFyIHN0cmF0ZWd5X2J1aWxkZXJfVHJhbnNwb3J0cyA9IHJ1bnRpbWUuVHJhbnNwb3J0cztcbnZhciBzdHJhdGVneV9idWlsZGVyX2RlZmluZVRyYW5zcG9ydCA9IGZ1bmN0aW9uIChjb25maWcsIG5hbWUsIHR5cGUsIHByaW9yaXR5LCBvcHRpb25zLCBtYW5hZ2VyKSB7XG4gICAgdmFyIHRyYW5zcG9ydENsYXNzID0gc3RyYXRlZ3lfYnVpbGRlcl9UcmFuc3BvcnRzW3R5cGVdO1xuICAgIGlmICghdHJhbnNwb3J0Q2xhc3MpIHtcbiAgICAgICAgdGhyb3cgbmV3IFVuc3VwcG9ydGVkVHJhbnNwb3J0KHR5cGUpO1xuICAgIH1cbiAgICB2YXIgZW5hYmxlZCA9ICghY29uZmlnLmVuYWJsZWRUcmFuc3BvcnRzIHx8XG4gICAgICAgIGFycmF5SW5kZXhPZihjb25maWcuZW5hYmxlZFRyYW5zcG9ydHMsIG5hbWUpICE9PSAtMSkgJiZcbiAgICAgICAgKCFjb25maWcuZGlzYWJsZWRUcmFuc3BvcnRzIHx8XG4gICAgICAgICAgICBhcnJheUluZGV4T2YoY29uZmlnLmRpc2FibGVkVHJhbnNwb3J0cywgbmFtZSkgPT09IC0xKTtcbiAgICB2YXIgdHJhbnNwb3J0O1xuICAgIGlmIChlbmFibGVkKSB7XG4gICAgICAgIG9wdGlvbnMgPSBPYmplY3QuYXNzaWduKHsgaWdub3JlTnVsbE9yaWdpbjogY29uZmlnLmlnbm9yZU51bGxPcmlnaW4gfSwgb3B0aW9ucyk7XG4gICAgICAgIHRyYW5zcG9ydCA9IG5ldyB0cmFuc3BvcnRfc3RyYXRlZ3kobmFtZSwgcHJpb3JpdHksIG1hbmFnZXIgPyBtYW5hZ2VyLmdldEFzc2lzdGFudCh0cmFuc3BvcnRDbGFzcykgOiB0cmFuc3BvcnRDbGFzcywgb3B0aW9ucyk7XG4gICAgfVxuICAgIGVsc2Uge1xuICAgICAgICB0cmFuc3BvcnQgPSBzdHJhdGVneV9idWlsZGVyX1Vuc3VwcG9ydGVkU3RyYXRlZ3k7XG4gICAgfVxuICAgIHJldHVybiB0cmFuc3BvcnQ7XG59O1xudmFyIHN0cmF0ZWd5X2J1aWxkZXJfVW5zdXBwb3J0ZWRTdHJhdGVneSA9IHtcbiAgICBpc1N1cHBvcnRlZDogZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgfSxcbiAgICBjb25uZWN0OiBmdW5jdGlvbiAoXywgY2FsbGJhY2spIHtcbiAgICAgICAgdmFyIGRlZmVycmVkID0gdXRpbC5kZWZlcihmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBjYWxsYmFjayhuZXcgVW5zdXBwb3J0ZWRTdHJhdGVneSgpKTtcbiAgICAgICAgfSk7XG4gICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICBhYm9ydDogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgIGRlZmVycmVkLmVuc3VyZUFib3J0ZWQoKTtcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBmb3JjZU1pblByaW9yaXR5OiBmdW5jdGlvbiAoKSB7IH1cbiAgICAgICAgfTtcbiAgICB9XG59O1xuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL2NvbmZpZy50c1xuXG5cbmZ1bmN0aW9uIGdldENvbmZpZyhvcHRzKSB7XG4gICAgdmFyIGNvbmZpZyA9IHtcbiAgICAgICAgYWN0aXZpdHlUaW1lb3V0OiBvcHRzLmFjdGl2aXR5VGltZW91dCB8fCBkZWZhdWx0cy5hY3Rpdml0eVRpbWVvdXQsXG4gICAgICAgIGF1dGhFbmRwb2ludDogb3B0cy5hdXRoRW5kcG9pbnQgfHwgZGVmYXVsdHMuYXV0aEVuZHBvaW50LFxuICAgICAgICBhdXRoVHJhbnNwb3J0OiBvcHRzLmF1dGhUcmFuc3BvcnQgfHwgZGVmYXVsdHMuYXV0aFRyYW5zcG9ydCxcbiAgICAgICAgY2x1c3Rlcjogb3B0cy5jbHVzdGVyIHx8IGRlZmF1bHRzLmNsdXN0ZXIsXG4gICAgICAgIGh0dHBQYXRoOiBvcHRzLmh0dHBQYXRoIHx8IGRlZmF1bHRzLmh0dHBQYXRoLFxuICAgICAgICBodHRwUG9ydDogb3B0cy5odHRwUG9ydCB8fCBkZWZhdWx0cy5odHRwUG9ydCxcbiAgICAgICAgaHR0cHNQb3J0OiBvcHRzLmh0dHBzUG9ydCB8fCBkZWZhdWx0cy5odHRwc1BvcnQsXG4gICAgICAgIHBvbmdUaW1lb3V0OiBvcHRzLnBvbmdUaW1lb3V0IHx8IGRlZmF1bHRzLnBvbmdUaW1lb3V0LFxuICAgICAgICBzdGF0c0hvc3Q6IG9wdHMuc3RhdHNIb3N0IHx8IGRlZmF1bHRzLnN0YXRzX2hvc3QsXG4gICAgICAgIHVuYXZhaWxhYmxlVGltZW91dDogb3B0cy51bmF2YWlsYWJsZVRpbWVvdXQgfHwgZGVmYXVsdHMudW5hdmFpbGFibGVUaW1lb3V0LFxuICAgICAgICB3c1BhdGg6IG9wdHMud3NQYXRoIHx8IGRlZmF1bHRzLndzUGF0aCxcbiAgICAgICAgd3NQb3J0OiBvcHRzLndzUG9ydCB8fCBkZWZhdWx0cy53c1BvcnQsXG4gICAgICAgIHdzc1BvcnQ6IG9wdHMud3NzUG9ydCB8fCBkZWZhdWx0cy53c3NQb3J0LFxuICAgICAgICBlbmFibGVTdGF0czogZ2V0RW5hYmxlU3RhdHNDb25maWcob3B0cyksXG4gICAgICAgIGh0dHBIb3N0OiBnZXRIdHRwSG9zdChvcHRzKSxcbiAgICAgICAgdXNlVExTOiBzaG91bGRVc2VUTFMob3B0cyksXG4gICAgICAgIHdzSG9zdDogZ2V0V2Vic29ja2V0SG9zdChvcHRzKVxuICAgIH07XG4gICAgaWYgKCdhdXRoJyBpbiBvcHRzKVxuICAgICAgICBjb25maWcuYXV0aCA9IG9wdHMuYXV0aDtcbiAgICBpZiAoJ2F1dGhvcml6ZXInIGluIG9wdHMpXG4gICAgICAgIGNvbmZpZy5hdXRob3JpemVyID0gb3B0cy5hdXRob3JpemVyO1xuICAgIGlmICgnZGlzYWJsZWRUcmFuc3BvcnRzJyBpbiBvcHRzKVxuICAgICAgICBjb25maWcuZGlzYWJsZWRUcmFuc3BvcnRzID0gb3B0cy5kaXNhYmxlZFRyYW5zcG9ydHM7XG4gICAgaWYgKCdlbmFibGVkVHJhbnNwb3J0cycgaW4gb3B0cylcbiAgICAgICAgY29uZmlnLmVuYWJsZWRUcmFuc3BvcnRzID0gb3B0cy5lbmFibGVkVHJhbnNwb3J0cztcbiAgICBpZiAoJ2lnbm9yZU51bGxPcmlnaW4nIGluIG9wdHMpXG4gICAgICAgIGNvbmZpZy5pZ25vcmVOdWxsT3JpZ2luID0gb3B0cy5pZ25vcmVOdWxsT3JpZ2luO1xuICAgIGlmICgndGltZWxpbmVQYXJhbXMnIGluIG9wdHMpXG4gICAgICAgIGNvbmZpZy50aW1lbGluZVBhcmFtcyA9IG9wdHMudGltZWxpbmVQYXJhbXM7XG4gICAgaWYgKCduYWNsJyBpbiBvcHRzKSB7XG4gICAgICAgIGNvbmZpZy5uYWNsID0gb3B0cy5uYWNsO1xuICAgIH1cbiAgICByZXR1cm4gY29uZmlnO1xufVxuZnVuY3Rpb24gZ2V0SHR0cEhvc3Qob3B0cykge1xuICAgIGlmIChvcHRzLmh0dHBIb3N0KSB7XG4gICAgICAgIHJldHVybiBvcHRzLmh0dHBIb3N0O1xuICAgIH1cbiAgICBpZiAob3B0cy5jbHVzdGVyKSB7XG4gICAgICAgIHJldHVybiBcInNvY2tqcy1cIiArIG9wdHMuY2x1c3RlciArIFwiLnB1c2hlci5jb21cIjtcbiAgICB9XG4gICAgcmV0dXJuIGRlZmF1bHRzLmh0dHBIb3N0O1xufVxuZnVuY3Rpb24gZ2V0V2Vic29ja2V0SG9zdChvcHRzKSB7XG4gICAgaWYgKG9wdHMud3NIb3N0KSB7XG4gICAgICAgIHJldHVybiBvcHRzLndzSG9zdDtcbiAgICB9XG4gICAgaWYgKG9wdHMuY2x1c3Rlcikge1xuICAgICAgICByZXR1cm4gZ2V0V2Vic29ja2V0SG9zdEZyb21DbHVzdGVyKG9wdHMuY2x1c3Rlcik7XG4gICAgfVxuICAgIHJldHVybiBnZXRXZWJzb2NrZXRIb3N0RnJvbUNsdXN0ZXIoZGVmYXVsdHMuY2x1c3Rlcik7XG59XG5mdW5jdGlvbiBnZXRXZWJzb2NrZXRIb3N0RnJvbUNsdXN0ZXIoY2x1c3Rlcikge1xuICAgIHJldHVybiBcIndzLVwiICsgY2x1c3RlciArIFwiLnB1c2hlci5jb21cIjtcbn1cbmZ1bmN0aW9uIHNob3VsZFVzZVRMUyhvcHRzKSB7XG4gICAgaWYgKHJ1bnRpbWUuZ2V0UHJvdG9jb2woKSA9PT0gJ2h0dHBzOicpIHtcbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgfVxuICAgIGVsc2UgaWYgKG9wdHMuZm9yY2VUTFMgPT09IGZhbHNlKSB7XG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9XG4gICAgcmV0dXJuIHRydWU7XG59XG5mdW5jdGlvbiBnZXRFbmFibGVTdGF0c0NvbmZpZyhvcHRzKSB7XG4gICAgaWYgKCdlbmFibGVTdGF0cycgaW4gb3B0cykge1xuICAgICAgICByZXR1cm4gb3B0cy5lbmFibGVTdGF0cztcbiAgICB9XG4gICAgaWYgKCdkaXNhYmxlU3RhdHMnIGluIG9wdHMpIHtcbiAgICAgICAgcmV0dXJuICFvcHRzLmRpc2FibGVTdGF0cztcbiAgICB9XG4gICAgcmV0dXJuIGZhbHNlO1xufVxuXG4vLyBDT05DQVRFTkFURUQgTU9EVUxFOiAuL3NyYy9jb3JlL3B1c2hlci50c1xuXG5cblxuXG5cblxuXG5cblxuXG5cblxudmFyIHB1c2hlcl9QdXNoZXIgPSAoZnVuY3Rpb24gKCkge1xuICAgIGZ1bmN0aW9uIFB1c2hlcihhcHBfa2V5LCBvcHRpb25zKSB7XG4gICAgICAgIHZhciBfdGhpcyA9IHRoaXM7XG4gICAgICAgIGNoZWNrQXBwS2V5KGFwcF9rZXkpO1xuICAgICAgICBvcHRpb25zID0gb3B0aW9ucyB8fCB7fTtcbiAgICAgICAgaWYgKCFvcHRpb25zLmNsdXN0ZXIgJiYgIShvcHRpb25zLndzSG9zdCB8fCBvcHRpb25zLmh0dHBIb3N0KSkge1xuICAgICAgICAgICAgdmFyIHN1ZmZpeCA9IHVybF9zdG9yZS5idWlsZExvZ1N1ZmZpeCgnamF2YXNjcmlwdFF1aWNrU3RhcnQnKTtcbiAgICAgICAgICAgIGxvZ2dlci53YXJuKFwiWW91IHNob3VsZCBhbHdheXMgc3BlY2lmeSBhIGNsdXN0ZXIgd2hlbiBjb25uZWN0aW5nLiBcIiArIHN1ZmZpeCk7XG4gICAgICAgIH1cbiAgICAgICAgaWYgKCdkaXNhYmxlU3RhdHMnIGluIG9wdGlvbnMpIHtcbiAgICAgICAgICAgIGxvZ2dlci53YXJuKCdUaGUgZGlzYWJsZVN0YXRzIG9wdGlvbiBpcyBkZXByZWNhdGVkIGluIGZhdm9yIG9mIGVuYWJsZVN0YXRzJyk7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy5rZXkgPSBhcHBfa2V5O1xuICAgICAgICB0aGlzLmNvbmZpZyA9IGdldENvbmZpZyhvcHRpb25zKTtcbiAgICAgICAgdGhpcy5jaGFubmVscyA9IGZhY3RvcnkuY3JlYXRlQ2hhbm5lbHMoKTtcbiAgICAgICAgdGhpcy5nbG9iYWxfZW1pdHRlciA9IG5ldyBkaXNwYXRjaGVyKCk7XG4gICAgICAgIHRoaXMuc2Vzc2lvbklEID0gTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogMTAwMDAwMDAwMCk7XG4gICAgICAgIHRoaXMudGltZWxpbmUgPSBuZXcgdGltZWxpbmVfdGltZWxpbmUodGhpcy5rZXksIHRoaXMuc2Vzc2lvbklELCB7XG4gICAgICAgICAgICBjbHVzdGVyOiB0aGlzLmNvbmZpZy5jbHVzdGVyLFxuICAgICAgICAgICAgZmVhdHVyZXM6IFB1c2hlci5nZXRDbGllbnRGZWF0dXJlcygpLFxuICAgICAgICAgICAgcGFyYW1zOiB0aGlzLmNvbmZpZy50aW1lbGluZVBhcmFtcyB8fCB7fSxcbiAgICAgICAgICAgIGxpbWl0OiA1MCxcbiAgICAgICAgICAgIGxldmVsOiB0aW1lbGluZV9sZXZlbC5JTkZPLFxuICAgICAgICAgICAgdmVyc2lvbjogZGVmYXVsdHMuVkVSU0lPTlxuICAgICAgICB9KTtcbiAgICAgICAgaWYgKHRoaXMuY29uZmlnLmVuYWJsZVN0YXRzKSB7XG4gICAgICAgICAgICB0aGlzLnRpbWVsaW5lU2VuZGVyID0gZmFjdG9yeS5jcmVhdGVUaW1lbGluZVNlbmRlcih0aGlzLnRpbWVsaW5lLCB7XG4gICAgICAgICAgICAgICAgaG9zdDogdGhpcy5jb25maWcuc3RhdHNIb3N0LFxuICAgICAgICAgICAgICAgIHBhdGg6ICcvdGltZWxpbmUvdjIvJyArIHJ1bnRpbWUuVGltZWxpbmVUcmFuc3BvcnQubmFtZVxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICAgICAgdmFyIGdldFN0cmF0ZWd5ID0gZnVuY3Rpb24gKG9wdGlvbnMpIHtcbiAgICAgICAgICAgIHJldHVybiBydW50aW1lLmdldERlZmF1bHRTdHJhdGVneShfdGhpcy5jb25maWcsIG9wdGlvbnMsIHN0cmF0ZWd5X2J1aWxkZXJfZGVmaW5lVHJhbnNwb3J0KTtcbiAgICAgICAgfTtcbiAgICAgICAgdGhpcy5jb25uZWN0aW9uID0gZmFjdG9yeS5jcmVhdGVDb25uZWN0aW9uTWFuYWdlcih0aGlzLmtleSwge1xuICAgICAgICAgICAgZ2V0U3RyYXRlZ3k6IGdldFN0cmF0ZWd5LFxuICAgICAgICAgICAgdGltZWxpbmU6IHRoaXMudGltZWxpbmUsXG4gICAgICAgICAgICBhY3Rpdml0eVRpbWVvdXQ6IHRoaXMuY29uZmlnLmFjdGl2aXR5VGltZW91dCxcbiAgICAgICAgICAgIHBvbmdUaW1lb3V0OiB0aGlzLmNvbmZpZy5wb25nVGltZW91dCxcbiAgICAgICAgICAgIHVuYXZhaWxhYmxlVGltZW91dDogdGhpcy5jb25maWcudW5hdmFpbGFibGVUaW1lb3V0LFxuICAgICAgICAgICAgdXNlVExTOiBCb29sZWFuKHRoaXMuY29uZmlnLnVzZVRMUylcbiAgICAgICAgfSk7XG4gICAgICAgIHRoaXMuY29ubmVjdGlvbi5iaW5kKCdjb25uZWN0ZWQnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBfdGhpcy5zdWJzY3JpYmVBbGwoKTtcbiAgICAgICAgICAgIGlmIChfdGhpcy50aW1lbGluZVNlbmRlcikge1xuICAgICAgICAgICAgICAgIF90aGlzLnRpbWVsaW5lU2VuZGVyLnNlbmQoX3RoaXMuY29ubmVjdGlvbi5pc1VzaW5nVExTKCkpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICAgICAgdGhpcy5jb25uZWN0aW9uLmJpbmQoJ21lc3NhZ2UnLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgICAgIHZhciBldmVudE5hbWUgPSBldmVudC5ldmVudDtcbiAgICAgICAgICAgIHZhciBpbnRlcm5hbCA9IGV2ZW50TmFtZS5pbmRleE9mKCdwdXNoZXJfaW50ZXJuYWw6JykgPT09IDA7XG4gICAgICAgICAgICBpZiAoZXZlbnQuY2hhbm5lbCkge1xuICAgICAgICAgICAgICAgIHZhciBjaGFubmVsID0gX3RoaXMuY2hhbm5lbChldmVudC5jaGFubmVsKTtcbiAgICAgICAgICAgICAgICBpZiAoY2hhbm5lbCkge1xuICAgICAgICAgICAgICAgICAgICBjaGFubmVsLmhhbmRsZUV2ZW50KGV2ZW50KTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBpZiAoIWludGVybmFsKSB7XG4gICAgICAgICAgICAgICAgX3RoaXMuZ2xvYmFsX2VtaXR0ZXIuZW1pdChldmVudC5ldmVudCwgZXZlbnQuZGF0YSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgICAgICB0aGlzLmNvbm5lY3Rpb24uYmluZCgnY29ubmVjdGluZycsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIF90aGlzLmNoYW5uZWxzLmRpc2Nvbm5lY3QoKTtcbiAgICAgICAgfSk7XG4gICAgICAgIHRoaXMuY29ubmVjdGlvbi5iaW5kKCdkaXNjb25uZWN0ZWQnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBfdGhpcy5jaGFubmVscy5kaXNjb25uZWN0KCk7XG4gICAgICAgIH0pO1xuICAgICAgICB0aGlzLmNvbm5lY3Rpb24uYmluZCgnZXJyb3InLCBmdW5jdGlvbiAoZXJyKSB7XG4gICAgICAgICAgICBsb2dnZXIud2FybihlcnIpO1xuICAgICAgICB9KTtcbiAgICAgICAgUHVzaGVyLmluc3RhbmNlcy5wdXNoKHRoaXMpO1xuICAgICAgICB0aGlzLnRpbWVsaW5lLmluZm8oeyBpbnN0YW5jZXM6IFB1c2hlci5pbnN0YW5jZXMubGVuZ3RoIH0pO1xuICAgICAgICBpZiAoUHVzaGVyLmlzUmVhZHkpIHtcbiAgICAgICAgICAgIHRoaXMuY29ubmVjdCgpO1xuICAgICAgICB9XG4gICAgfVxuICAgIFB1c2hlci5yZWFkeSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgUHVzaGVyLmlzUmVhZHkgPSB0cnVlO1xuICAgICAgICBmb3IgKHZhciBpID0gMCwgbCA9IFB1c2hlci5pbnN0YW5jZXMubGVuZ3RoOyBpIDwgbDsgaSsrKSB7XG4gICAgICAgICAgICBQdXNoZXIuaW5zdGFuY2VzW2ldLmNvbm5lY3QoKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgUHVzaGVyLmdldENsaWVudEZlYXR1cmVzID0gZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4ga2V5cyhmaWx0ZXJPYmplY3QoeyB3czogcnVudGltZS5UcmFuc3BvcnRzLndzIH0sIGZ1bmN0aW9uICh0KSB7XG4gICAgICAgICAgICByZXR1cm4gdC5pc1N1cHBvcnRlZCh7fSk7XG4gICAgICAgIH0pKTtcbiAgICB9O1xuICAgIFB1c2hlci5wcm90b3R5cGUuY2hhbm5lbCA9IGZ1bmN0aW9uIChuYW1lKSB7XG4gICAgICAgIHJldHVybiB0aGlzLmNoYW5uZWxzLmZpbmQobmFtZSk7XG4gICAgfTtcbiAgICBQdXNoZXIucHJvdG90eXBlLmFsbENoYW5uZWxzID0gZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gdGhpcy5jaGFubmVscy5hbGwoKTtcbiAgICB9O1xuICAgIFB1c2hlci5wcm90b3R5cGUuY29ubmVjdCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy5jb25uZWN0aW9uLmNvbm5lY3QoKTtcbiAgICAgICAgaWYgKHRoaXMudGltZWxpbmVTZW5kZXIpIHtcbiAgICAgICAgICAgIGlmICghdGhpcy50aW1lbGluZVNlbmRlclRpbWVyKSB7XG4gICAgICAgICAgICAgICAgdmFyIHVzaW5nVExTID0gdGhpcy5jb25uZWN0aW9uLmlzVXNpbmdUTFMoKTtcbiAgICAgICAgICAgICAgICB2YXIgdGltZWxpbmVTZW5kZXIgPSB0aGlzLnRpbWVsaW5lU2VuZGVyO1xuICAgICAgICAgICAgICAgIHRoaXMudGltZWxpbmVTZW5kZXJUaW1lciA9IG5ldyBQZXJpb2RpY1RpbWVyKDYwMDAwLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgIHRpbWVsaW5lU2VuZGVyLnNlbmQodXNpbmdUTFMpO1xuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfTtcbiAgICBQdXNoZXIucHJvdG90eXBlLmRpc2Nvbm5lY3QgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMuY29ubmVjdGlvbi5kaXNjb25uZWN0KCk7XG4gICAgICAgIGlmICh0aGlzLnRpbWVsaW5lU2VuZGVyVGltZXIpIHtcbiAgICAgICAgICAgIHRoaXMudGltZWxpbmVTZW5kZXJUaW1lci5lbnN1cmVBYm9ydGVkKCk7XG4gICAgICAgICAgICB0aGlzLnRpbWVsaW5lU2VuZGVyVGltZXIgPSBudWxsO1xuICAgICAgICB9XG4gICAgfTtcbiAgICBQdXNoZXIucHJvdG90eXBlLmJpbmQgPSBmdW5jdGlvbiAoZXZlbnRfbmFtZSwgY2FsbGJhY2ssIGNvbnRleHQpIHtcbiAgICAgICAgdGhpcy5nbG9iYWxfZW1pdHRlci5iaW5kKGV2ZW50X25hbWUsIGNhbGxiYWNrLCBjb250ZXh0KTtcbiAgICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfTtcbiAgICBQdXNoZXIucHJvdG90eXBlLnVuYmluZCA9IGZ1bmN0aW9uIChldmVudF9uYW1lLCBjYWxsYmFjaywgY29udGV4dCkge1xuICAgICAgICB0aGlzLmdsb2JhbF9lbWl0dGVyLnVuYmluZChldmVudF9uYW1lLCBjYWxsYmFjaywgY29udGV4dCk7XG4gICAgICAgIHJldHVybiB0aGlzO1xuICAgIH07XG4gICAgUHVzaGVyLnByb3RvdHlwZS5iaW5kX2dsb2JhbCA9IGZ1bmN0aW9uIChjYWxsYmFjaykge1xuICAgICAgICB0aGlzLmdsb2JhbF9lbWl0dGVyLmJpbmRfZ2xvYmFsKGNhbGxiYWNrKTtcbiAgICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfTtcbiAgICBQdXNoZXIucHJvdG90eXBlLnVuYmluZF9nbG9iYWwgPSBmdW5jdGlvbiAoY2FsbGJhY2spIHtcbiAgICAgICAgdGhpcy5nbG9iYWxfZW1pdHRlci51bmJpbmRfZ2xvYmFsKGNhbGxiYWNrKTtcbiAgICAgICAgcmV0dXJuIHRoaXM7XG4gICAgfTtcbiAgICBQdXNoZXIucHJvdG90eXBlLnVuYmluZF9hbGwgPSBmdW5jdGlvbiAoY2FsbGJhY2spIHtcbiAgICAgICAgdGhpcy5nbG9iYWxfZW1pdHRlci51bmJpbmRfYWxsKCk7XG4gICAgICAgIHJldHVybiB0aGlzO1xuICAgIH07XG4gICAgUHVzaGVyLnByb3RvdHlwZS5zdWJzY3JpYmVBbGwgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBjaGFubmVsTmFtZTtcbiAgICAgICAgZm9yIChjaGFubmVsTmFtZSBpbiB0aGlzLmNoYW5uZWxzLmNoYW5uZWxzKSB7XG4gICAgICAgICAgICBpZiAodGhpcy5jaGFubmVscy5jaGFubmVscy5oYXNPd25Qcm9wZXJ0eShjaGFubmVsTmFtZSkpIHtcbiAgICAgICAgICAgICAgICB0aGlzLnN1YnNjcmliZShjaGFubmVsTmFtZSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9O1xuICAgIFB1c2hlci5wcm90b3R5cGUuc3Vic2NyaWJlID0gZnVuY3Rpb24gKGNoYW5uZWxfbmFtZSkge1xuICAgICAgICB2YXIgY2hhbm5lbCA9IHRoaXMuY2hhbm5lbHMuYWRkKGNoYW5uZWxfbmFtZSwgdGhpcyk7XG4gICAgICAgIGlmIChjaGFubmVsLnN1YnNjcmlwdGlvblBlbmRpbmcgJiYgY2hhbm5lbC5zdWJzY3JpcHRpb25DYW5jZWxsZWQpIHtcbiAgICAgICAgICAgIGNoYW5uZWwucmVpbnN0YXRlU3Vic2NyaXB0aW9uKCk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAoIWNoYW5uZWwuc3Vic2NyaXB0aW9uUGVuZGluZyAmJlxuICAgICAgICAgICAgdGhpcy5jb25uZWN0aW9uLnN0YXRlID09PSAnY29ubmVjdGVkJykge1xuICAgICAgICAgICAgY2hhbm5lbC5zdWJzY3JpYmUoKTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gY2hhbm5lbDtcbiAgICB9O1xuICAgIFB1c2hlci5wcm90b3R5cGUudW5zdWJzY3JpYmUgPSBmdW5jdGlvbiAoY2hhbm5lbF9uYW1lKSB7XG4gICAgICAgIHZhciBjaGFubmVsID0gdGhpcy5jaGFubmVscy5maW5kKGNoYW5uZWxfbmFtZSk7XG4gICAgICAgIGlmIChjaGFubmVsICYmIGNoYW5uZWwuc3Vic2NyaXB0aW9uUGVuZGluZykge1xuICAgICAgICAgICAgY2hhbm5lbC5jYW5jZWxTdWJzY3JpcHRpb24oKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgIGNoYW5uZWwgPSB0aGlzLmNoYW5uZWxzLnJlbW92ZShjaGFubmVsX25hbWUpO1xuICAgICAgICAgICAgaWYgKGNoYW5uZWwgJiYgY2hhbm5lbC5zdWJzY3JpYmVkKSB7XG4gICAgICAgICAgICAgICAgY2hhbm5lbC51bnN1YnNjcmliZSgpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfTtcbiAgICBQdXNoZXIucHJvdG90eXBlLnNlbmRfZXZlbnQgPSBmdW5jdGlvbiAoZXZlbnRfbmFtZSwgZGF0YSwgY2hhbm5lbCkge1xuICAgICAgICByZXR1cm4gdGhpcy5jb25uZWN0aW9uLnNlbmRfZXZlbnQoZXZlbnRfbmFtZSwgZGF0YSwgY2hhbm5lbCk7XG4gICAgfTtcbiAgICBQdXNoZXIucHJvdG90eXBlLnNob3VsZFVzZVRMUyA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMuY29uZmlnLnVzZVRMUztcbiAgICB9O1xuICAgIFB1c2hlci5pbnN0YW5jZXMgPSBbXTtcbiAgICBQdXNoZXIuaXNSZWFkeSA9IGZhbHNlO1xuICAgIFB1c2hlci5sb2dUb0NvbnNvbGUgPSBmYWxzZTtcbiAgICBQdXNoZXIuUnVudGltZSA9IHJ1bnRpbWU7XG4gICAgUHVzaGVyLlNjcmlwdFJlY2VpdmVycyA9IHJ1bnRpbWUuU2NyaXB0UmVjZWl2ZXJzO1xuICAgIFB1c2hlci5EZXBlbmRlbmNpZXNSZWNlaXZlcnMgPSBydW50aW1lLkRlcGVuZGVuY2llc1JlY2VpdmVycztcbiAgICBQdXNoZXIuYXV0aF9jYWxsYmFja3MgPSBydW50aW1lLmF1dGhfY2FsbGJhY2tzO1xuICAgIHJldHVybiBQdXNoZXI7XG59KCkpO1xuLyogaGFybW9ueSBkZWZhdWx0IGV4cG9ydCAqLyB2YXIgY29yZV9wdXNoZXIgPSBfX3dlYnBhY2tfZXhwb3J0c19fW1wiZGVmYXVsdFwiXSA9IChwdXNoZXJfUHVzaGVyKTtcbmZ1bmN0aW9uIGNoZWNrQXBwS2V5KGtleSkge1xuICAgIGlmIChrZXkgPT09IG51bGwgfHwga2V5ID09PSB1bmRlZmluZWQpIHtcbiAgICAgICAgdGhyb3cgJ1lvdSBtdXN0IHBhc3MgeW91ciBhcHAga2V5IHdoZW4geW91IGluc3RhbnRpYXRlIFB1c2hlci4nO1xuICAgIH1cbn1cbnJ1bnRpbWUuc2V0dXAocHVzaGVyX1B1c2hlcik7XG5cblxuLyoqKi8gfSlcbi8qKioqKiovIF0pO1xufSk7Il0sIm5hbWVzIjpbIkVjaG8iLCJ3aW5kb3ciLCJQdXNoZXIiLCJyZXF1aXJlIiwiYnJvYWRjYXN0ZXIiLCJrZXkiLCJwcm9jZXNzIiwiZW52IiwiTUlYX1BVU0hFUl9BUFBfS0VZIiwiY2x1c3RlciIsIk1JWF9QVVNIRVJfQVBQX0NMVVNURVIiLCJlbmNyeXB0ZWQiLCJXaW5kb3ciLCJjaGFubmVsIiwibGlzdGVuIiwiZSIsImNvbnNvbGUiLCJsb2ciLCJfIiwiU3dhbCIsIlBvcHBlciIsIiQiLCJqUXVlcnkiLCJheGlvcyIsImRlZmF1bHRzIiwiaGVhZGVycyIsImNvbW1vbiJdLCJzb3VyY2VSb290IjoiIn0=