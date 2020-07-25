class PauseOrPlayButton extends React.Component {
    render() {
        return (
            React.createElement("button", {
                className: "btn btn-primary btn-md",
                onClick: this.props.pauseOrPlay
            }, this.props.name)
        );
    }
}

export default PauseOrPlayButton
