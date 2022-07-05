import React from "react";
import Style from "../values/Style";

const styles = {
    container: {
        display: 'flex',
        flexDirection: 'column',
        width: '80%',
        height: '80%',
        paddingTop: 24,
        paddingRight: 56,
        paddingBottom: 24,
        paddingLeft: 56,
        borderRadius: 16,
        backgroundColor: 'white',
        alignItems:'center'
    },
}

const Card = (props) => {
    return (
        <div style={styles.container}>
            <text style={Style.title}>{props.title}</text>
            {props.children}
        </div>
    )
}

export default Card