class Demo extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            'playingVideo': false,
        };
    }


    render() {

        return (

            React.createElement("div", {
                class: "Tutorial"
            }, React.createElement(ReactPlayer, {
                class: "edit_video",
                url: "https://youtu.be/OJamIBCMu8Q",
                width: "100%",
                pip: true,
                ref: "vidRef",
                controls: true,
                playing: this.state.playingVideo
            }))

        );
    }
}

export default Demo
