---
title: What is systemd?
description: systemd organizes tasks into components called units, and groups of units into targets, that can be used to create dependencies on other system services and resources. Learn more about systemd with your audible glossary!
tags: glossary, linux, systemd
cover_image: https://community-cdn-digitalocean-com.global.ssl.fastly.net/variants/PcJyDaaLwTjkdriqXFpDajCM/035575f2985fe451d86e717d73691e533a1a00545d7230900ed786341dc3c882
---
{% user jamonation %}

Listen to our audible definition of **systemd**.

{% audio /audio/systemd.mp3 %}

### Transcription

Many Linux distributions use systemd to manage system settings and services.
systemd organizes tasks into components called units, and groups of units into targets, that can be used to create dependencies on other system services and resources.

systemd can start units and targets automatically at boot time, or when requested by a user or another systemd target when a server is already running.

The systemctl command is used to interact with processes that are controlled by systemd. It can examine the status of units and targets, as well as start, stop, and reconfigure them.

{% tutorial what-is-systemd-2 %}